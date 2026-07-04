@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Editar Cliente</h1>
        <p class="text-sm text-gray-500 mt-1">
            <a href="{{ route('clientes.index') }}" class="hover:underline">Clientes</a> / Editar
        </p>
    </div>

    <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="bg-white rounded-xl border border-gray-100 p-6 max-w-3xl">
        @csrf
        @method('PUT')
        @include('clientes._form')

        <div class="flex items-center gap-3 mt-6">
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Guardar Cambios
            </button>
            <a href="{{ route('clientes.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                Cancelar
            </a>
        </div>
    </form>

@endsection