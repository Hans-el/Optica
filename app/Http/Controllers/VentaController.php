<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        // TODO: reemplazar por Venta::with('cliente')->all()
        $ventas = [
            ['id' => 1, 'cliente' => 'María Gómez', 'total' => 120.00, 'fecha' => '2026-06-28', 'estado' => 'Pagada'],
            ['id' => 2, 'cliente' => 'Carlos Pérez', 'total' => 210.00, 'fecha' => '2026-07-01', 'estado' => 'Pendiente'],
        ];

        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        return view('ventas.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente');
    }

    public function show(string $id)
    {
        $venta = ['id' => $id, 'cliente' => 'María Gómez', 'total' => 120.00, 'fecha' => '2026-06-28', 'estado' => 'Pagada'];

        return view('ventas.show', compact('venta'));
    }

    public function edit(string $id)
    {
        $venta = ['id' => $id, 'cliente' => 'María Gómez', 'total' => 120.00, 'fecha' => '2026-06-28', 'estado' => 'Pagada'];

        return view('ventas.edit', compact('venta'));
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente');
    }

    public function destroy(string $id)
    {
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente');
    }
}