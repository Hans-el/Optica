@extends('layouts.app')

@section('title', $lente->nombre)

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $lente->nombre }}</h1>
        <p class="text-sm text-gray-500 mt-1">
            <a href="{{ route('lentes.index') }}" class="hover:underline">Lentes</a> / {{ $lente->nombre }}
        </p>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 p-6 max-w-3xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Marca</p>
                <p class="text-gray-900 font-medium">{{ $lente->marca->nombre }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Categoría</p>
                <p class="text-gray-900 font-medium">{{ $lente->categoria->nombre }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">SKU</p>
                <p class="text-gray-900 font-medium">{{ $lente->sku }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Proveedor</p>
                <p class="text-gray-900 font-medium">{{ $lente->proveedor->nombre ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Precio</p>
                <p class="text-emerald-600 font-bold">${{ number_format($lente->precio, 2) }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Stock</p>
                <p class="text-gray-900 font-medium">{{ $lente->stock }} unidades</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Material</p>
                <p class="text-gray-900 font-medium">{{ $lente->material ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Color</p>
                <p class="text-gray-900 font-medium">{{ $lente->color ?? '—' }}</p>
            </div>
        </div>

        @if ($lente->descripcion)
            <div class="mt-6">
                <p class="text-xs text-gray-400 uppercase tracking-wide">Descripción</p>
                <p class="text-gray-700 mt-1">{{ $lente->descripcion }}</p>
            </div>
        @endif

        <div class="flex items-center gap-3 mt-6">
            <a href="{{ route('lentes.edit', $lente) }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Editar
            </a>
            <a href="{{ route('lentes.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                Volver
            </a>
        </div>
    </div>

@endsection