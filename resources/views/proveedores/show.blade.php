@extends('layouts.app')

@section('title', $proveedor->nombre)

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $proveedor->nombre }}</h1>
        <p class="text-sm text-gray-500 mt-1">
            <a href="{{ route('proveedores.index') }}" class="hover:underline">Proveedores</a> / {{ $proveedor->nombre }}
        </p>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 p-6 max-w-2xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Contacto</p>
                <p class="text-gray-900 font-medium">{{ $proveedor->nombre_contacto ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Teléfono</p>
                <p class="text-gray-900 font-medium">{{ $proveedor->telefono ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Email</p>
                <p class="text-gray-900 font-medium">{{ $proveedor->email ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">RUC</p>
                <p class="text-gray-900 font-medium">{{ $proveedor->ruc ?? '—' }}</p>
            </div>
            <div class="sm:col-span-2">
                <p class="text-xs text-gray-400 uppercase tracking-wide">Dirección</p>
                <p class="text-gray-900 font-medium">{{ $proveedor->direccion ?? '—' }}</p>
            </div>
        </div>

        <div class="bg-emerald-50 rounded-lg p-4 text-center max-w-40 mt-6">
            <p class="text-2xl font-bold text-emerald-700">{{ $proveedor->lentes_count }}</p>
            <p class="text-xs text-gray-500 mt-1">Lentes suministrados</p>
        </div>

        <div class="flex items-center gap-3 mt-6">
            <a href="{{ route('proveedores.edit', $proveedor) }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Editar
            </a>
            <a href="{{ route('proveedores.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                Volver
            </a>
        </div>
    </div>

@endsection