<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaRequest;
use App\Models\Cliente;
use App\Models\Lente;
use App\Models\Receta;
use App\Models\Venta;
use App\Models\VentaDetalle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VentaController extends Controller
{
    // Porcentaje de IVA (Ecuador). Ajusta aquí si cambia la ley tributaria.
    private const IVA = 0.15;

    public function index()
    {
        $ventas = Venta::with(['cliente', 'vendedor'])
            ->latest('fecha_venta')
            ->paginate(10);

        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $recetas = Receta::with('cliente')->latest('fecha_examen')->get();

        // Solo lentes con stock disponible, con los datos que necesita el JS del formulario
        $lentes = Lente::where('activo', true)
            ->where('stock', '>', 0)
            ->orderBy('nombre')
            ->get(['id', 'nombre', 'sku', 'precio', 'stock']);

        return view('ventas.create', compact('clientes', 'recetas', 'lentes'));
    }

    public function store(VentaRequest $request)
    {
        $venta = DB::transaction(function () use ($request) {
            $subtotal = 0;
            $lineas = [];

            // 1) Calculamos cada línea usando el precio REAL del lente en BD
            //    (nunca el que venga del formulario, para evitar manipulación)
            foreach ($request->items as $item) {
                $lente = Lente::lockForUpdate()->findOrFail($item['lente_id']);

                if ($item['cantidad'] > $lente->stock) {
                    abort(422, "Stock insuficiente para \"{$lente->nombre}\".");
                }

                $subtotalLinea = $lente->precio * $item['cantidad'];
                $subtotal += $subtotalLinea;

                $lineas[] = [
                    'lente' => $lente,
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $lente->precio,
                    'subtotal' => $subtotalLinea,
                ];
            }

            $descuento = $request->input('descuento', 0);
            $impuesto = round(($subtotal - $descuento) * self::IVA, 2);
            $total = $subtotal - $descuento + $impuesto;

            // 2) Cabecera de la venta
            $venta = Venta::create([
                'numero_venta' => 'VT-' . now()->format('Ymd') . '-' . Str::upper(Str::random(5)),
                'cliente_id' => $request->cliente_id,
                'user_id' => auth()->id(), // ya disponible: el usuario autenticado que registra la venta
                'receta_id' => $request->receta_id,
                'fecha_venta' => now(),
                'subtotal' => $subtotal,
                'descuento' => $descuento,
                'impuesto' => $impuesto,
                'total' => $total,
                'metodo_pago' => $request->metodo_pago,
                'estado' => 'pagada',
                'notas' => $request->notas,
            ]);

            // 3) Líneas de detalle + descuento de stock
            foreach ($lineas as $linea) {
                VentaDetalle::create([
                    'venta_id' => $venta->id,
                    'lente_id' => $linea['lente']->id,
                    'cantidad' => $linea['cantidad'],
                    'precio_unitario' => $linea['precio_unitario'],
                    'descuento' => 0,
                    'subtotal' => $linea['subtotal'],
                ]);

                $linea['lente']->decrement('stock', $linea['cantidad']);
            }

            return $venta;
        });

        return redirect()
            ->route('ventas.show', $venta)
            ->with('success', "Venta {$venta->numero_venta} registrada correctamente");
    }

    public function show(Venta $venta)
    {
        $venta->load(['cliente', 'vendedor', 'receta', 'detalles.lente']);

        return view('ventas.show', compact('venta'));
    }

    /**
     * Por diseño, NO se editan las líneas de una venta ya facturada
     * (afectaría el stock ya descontado e historial contable).
     * Aquí solo se permite corregir estado, método de pago y notas.
     */
    public function edit(Venta $venta)
    {
        $venta->load(['cliente', 'detalles.lente']);

        return view('ventas.edit', compact('venta'));
    }

    public function update(Venta $venta)
    {
        $estadoAnterior = $venta->estado;
        $nuevoEstado = request('estado', $venta->estado);

        $venta->update([
            'metodo_pago' => request('metodo_pago', $venta->metodo_pago),
            'notas' => request('notas', $venta->notas),
            'estado' => $nuevoEstado,
        ]);

        // Si se está cancelando una venta que no estaba cancelada, devolvemos el stock
        if ($nuevoEstado === 'cancelada' && $estadoAnterior !== 'cancelada') {
            $this->restaurarStock($venta);
        }

        return redirect()
            ->route('ventas.show', $venta)
            ->with('success', 'Venta actualizada correctamente');
    }

    /**
     * "Eliminar" una venta en realidad la CANCELA y devuelve el stock.
     * No se borra el registro para conservar el historial.
     */
    public function destroy(Venta $venta)
    {
        if ($venta->estado === 'cancelada') {
            return redirect()
                ->route('ventas.index')
                ->with('success', 'Esa venta ya estaba cancelada.');
        }

        DB::transaction(function () use ($venta) {
            $this->restaurarStock($venta);
            $venta->update(['estado' => 'cancelada']);
        });

        return redirect()
            ->route('ventas.index')
            ->with('success', "Venta {$venta->numero_venta} cancelada y stock restaurado");
    }

    private function restaurarStock(Venta $venta): void
    {
        foreach ($venta->detalles as $detalle) {
            $detalle->lente()->increment('stock', $detalle->cantidad);
        }
    }
}