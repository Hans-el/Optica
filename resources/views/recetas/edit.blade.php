@extends('layouts.app')

@section('title', 'Editar Receta')

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Editar Receta</h1>
        <p class="text-sm text-gray-500 mt-1">
            <a href="{{ route('recetas.index') }}" class="hover:underline">Recetas</a> / Editar
        </p>
    </div>

    <form action="{{ route('recetas.update', $receta) }}" method="POST" class="bg-white rounded-xl border border-gray-100 p-6 max-w-4xl">
        @csrf
        @method('PUT')
        @include('recetas._form')

        <div class="flex items-center gap-3 mt-6">
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Guardar Cambios
            </button>
            <a href="{{ route('recetas.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                Cancelar
            </a>
        </div>
    </form>

@endsection