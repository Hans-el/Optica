@extends('layouts.app')

@section('title', $usuario->name)

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $usuario->name }}</h1>
        <p class="text-sm text-gray-500 mt-1">
            <a href="{{ route('usuarios.index') }}" class="hover:underline">Usuarios</a> / {{ $usuario->name }}
        </p>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 p-6 max-w-2xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Email</p>
                <p class="text-gray-900 font-medium">{{ $usuario->email }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Rol</p>
                <p class="text-gray-900 font-medium capitalize">{{ $usuario->rol }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Teléfono</p>
                <p class="text-gray-900 font-medium">{{ $usuario->telefono ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Estado</p>
                <p class="text-gray-900 font-medium">{{ $usuario->activo ? 'Activo' : 'Inactivo' }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 mt-6">
            <a href="{{ route('usuarios.edit', $usuario) }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Editar
            </a>
            <a href="{{ route('usuarios.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                Volver
            </a>
        </div>
    </div>

@endsection