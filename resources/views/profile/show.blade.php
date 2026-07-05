@extends('layouts.app')

@section('title', 'Mi perfil')

@section('content')

    <h1 class="text-3xl font-bold text-gray-900 mb-6">Mi perfil</h1>

    <div class="bg-white rounded-xl border border-gray-100 p-6 max-w-lg">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Nombre</p>
                <p class="text-gray-900 font-medium">{{ $usuario->name }}</p>
            </div>
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
        </div>

        <a href="{{ route('usuarios.edit', $usuario) }}" class="inline-block mt-6 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
            Editar mis datos
        </a>
    </div>

@endsection