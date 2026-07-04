@extends('layouts.app')

@section('title', 'Editar Venta')

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Editar Venta {{ $venta->numero_venta }}</h1>
        <p class="text-sm text-gray-500 mt-1">
            <a href="{{ route('ventas.index') }}" class="hover:underline">Ventas</a> / Editar
        </p>
    </div>

    <div class="bg-amber-50 border border-amber-200 text-amber-800 text-sm rounded-lg px-4 py-3 mb-6 max-w-2xl">
        Por control de stock e historial, las líneas de una venta ya registrada no se pueden modificar.
        Si necesitas corregir los lentes o cantidades, cancela esta venta y crea una nueva.
    </div>

    <form action="{{ route('ventas.update', $venta) }}" method="POST" class="bg-white rounded-xl border border-gray-100 p-6 max-w-2xl">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                <select name="estado" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    @foreach (['pendiente' => 'Pendiente', 'pagada' => 'Pagada', 'cancelada' => 'Cancelada'] as $value => $label)
                        <option value="{{ $value }}" @selected($venta->estado == $value)>{{ $label }}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-400 mt-1">Cambiar a "Cancelada" devuelve el stock automáticamente.</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Método de pago</label>
                <select name="metodo_pago" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    @foreach (['efectivo' => 'Efectivo', 'tarjeta' => 'Tarjeta', 'transferencia' => 'Transferencia', 'mixto' => 'Mixto'] as $value => $label)
                        <option value="{{ $value }}" @selected($venta->metodo_pago == $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Notas</label>
                <textarea name="notas" rows="3"
                          class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ $venta->notas }}</textarea>
            </div>
        </div>

        {{-- Referencia de las líneas (solo lectura) --}}
        <div class="mt-6 border-t border-gray-100 pt-4">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-2">Líneas de esta venta (solo lectura)</p>
            <ul class="text-sm text-gray-600 space-y-1">
                @foreach ($venta->detalles as $detalle)
                    <li>{{ $detalle->cantidad }} × {{ $detalle->lente->nombre }} — ${{ number_format($detalle->subtotal, 2) }}</li>
                @endforeach
            </ul>
        </div>

        <div class="flex items-center gap-3 mt-6">
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Guardar Cambios
            </button>
            <a href="{{ route('ventas.show', $venta) }}" class="text-sm text-gray-500 hover:text-gray-700">
                Cancelar
            </a>
        </div>
    </form>

@endsection