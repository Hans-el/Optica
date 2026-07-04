@extends('layouts.app')

@section('title', 'Venta ' . $venta->numero_venta)

@section('content')

    @if (session('success'))
        <div class="mb-6 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Venta {{ $venta->numero_venta }}</h1>
            <p class="text-sm text-gray-500 mt-1">
                <a href="{{ route('ventas.index') }}" class="hover:underline">Ventas</a> / {{ $venta->numero_venta }}
            </p>
        </div>

        @php
            $colores = [
                'pagada' => 'bg-emerald-50 text-emerald-700',
                'pendiente' => 'bg-amber-50 text-amber-700',
                'cancelada' => 'bg-red-50 text-red-600',
            ];
        @endphp
        <span class="text-sm font-semibold px-3 py-1.5 rounded-full {{ $colores[$venta->estado] }} capitalize">
            {{ $venta->estado }}
        </span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Detalle de líneas --}}
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-100 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                    <tr>
                        <th class="text-left px-5 py-3 font-medium">Lente</th>
                        <th class="text-center px-5 py-3 font-medium">Cant.</th>
                        <th class="text-right px-5 py-3 font-medium">Precio</th>
                        <th class="text-right px-5 py-3 font-medium">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($venta->detalles as $detalle)
                        <tr>
                            <td class="px-5 py-3 text-gray-900">{{ $detalle->lente->nombre }}</td>
                            <td class="px-5 py-3 text-center text-gray-600">{{ $detalle->cantidad }}</td>
                            <td class="px-5 py-3 text-right text-gray-600">${{ number_format($detalle->precio_unitario, 2) }}</td>
                            <td class="px-5 py-3 text-right font-medium text-gray-900">${{ number_format($detalle->subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-5 border-t border-gray-100 space-y-1.5 text-sm">
                <div class="flex justify-between text-gray-600">
                    <span>Subtotal</span>
                    <span>${{ number_format($venta->subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Descuento</span>
                    <span>- ${{ number_format($venta->descuento, 2) }}</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>IVA (15%)</span>
                    <span>${{ number_format($venta->impuesto, 2) }}</span>
                </div>
                <div class="flex justify-between text-base font-bold text-gray-900 pt-2 border-t border-gray-100">
                    <span>Total</span>
                    <span class="text-emerald-700">${{ number_format($venta->total, 2) }}</span>
                </div>
            </div>
        </div>

        {{-- Info general --}}
        <div class="bg-white rounded-xl border border-gray-100 p-5 space-y-4">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Cliente</p>
                <p class="text-gray-900 font-medium">{{ $venta->cliente->nombre_completo }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Vendedor</p>
                <p class="text-gray-900 font-medium">{{ $venta->vendedor->name ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Fecha</p>
                <p class="text-gray-900 font-medium">{{ $venta->fecha_venta->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Método de pago</p>
                <p class="text-gray-900 font-medium capitalize">{{ $venta->metodo_pago }}</p>
            </div>
            @if ($venta->receta)
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide">Receta asociada</p>
                    <a href="{{ route('recetas.show', $venta->receta) }}" class="text-emerald-700 font-medium hover:underline">
                        Ver receta del {{ $venta->receta->fecha_examen->format('d/m/Y') }}
                    </a>
                </div>
            @endif
            @if ($venta->notas)
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide">Notas</p>
                    <p class="text-gray-700">{{ $venta->notas }}</p>
                </div>
            @endif

            <div class="pt-2">
                <a href="{{ route('ventas.edit', $venta) }}" class="text-sm text-emerald-700 hover:underline">
                    Editar estado / método de pago
                </a>
            </div>
        </div>
    </div>

@endsection