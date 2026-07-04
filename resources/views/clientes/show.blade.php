@extends('layouts.app')

@section('title', $cliente->nombre_completo)

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $cliente->nombre_completo }}</h1>
        <p class="text-sm text-gray-500 mt-1">
            <a href="{{ route('clientes.index') }}" class="hover:underline">Clientes</a> / {{ $cliente->nombre_completo }}
        </p>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 p-6 max-w-3xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Cédula</p>
                <p class="text-gray-900 font-medium">{{ $cliente->cedula }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Teléfono</p>
                <p class="text-gray-900 font-medium">{{ $cliente->telefono ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Email</p>
                <p class="text-gray-900 font-medium">{{ $cliente->email ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Dirección</p>
                <p class="text-gray-900 font-medium">{{ $cliente->direccion ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Fecha de nacimiento</p>
                <p class="text-gray-900 font-medium">{{ $cliente->fecha_nacimiento?->format('d/m/Y') ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Género</p>
                <p class="text-gray-900 font-medium capitalize">{{ $cliente->genero ?? '—' }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-6 pt-6 border-t border-gray-100">
            <div class="bg-emerald-50 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-emerald-700">{{ $cliente->ventas_count }}</p>
                <p class="text-xs text-gray-500 mt-1">Ventas realizadas</p>
            </div>
            <div class="bg-emerald-50 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-emerald-700">{{ $cliente->recetas_count }}</p>
                <p class="text-xs text-gray-500 mt-1">Recetas registradas</p>
            </div>
        </div>

        <div class="flex items-center gap-3 mt-6">
            <a href="{{ route('clientes.edit', $cliente) }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Editar
            </a>
            <a href="{{ route('clientes.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                Volver
            </a>
        </div>
    </div>

@endsection