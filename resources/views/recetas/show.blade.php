@extends('layouts.app')

@section('title', 'Receta de ' . $receta->cliente->nombre_completo)

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Receta — {{ $receta->cliente->nombre_completo }}</h1>
        <p class="text-sm text-gray-500 mt-1">
            <a href="{{ route('recetas.index') }}" class="hover:underline">Recetas</a> / {{ $receta->fecha_examen->format('d/m/Y') }}
        </p>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 p-6 max-w-4xl">

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Cliente</p>
                <p class="text-gray-900 font-medium">{{ $receta->cliente->nombre_completo }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Optometrista</p>
                <p class="text-gray-900 font-medium">{{ $receta->optometrista->name ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Fecha del examen</p>
                <p class="text-gray-900 font-medium">{{ $receta->fecha_examen->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
            <div class="border border-gray-100 rounded-lg p-4">
                <p class="text-sm font-semibold text-gray-700 mb-3">Ojo Derecho (OD)</p>
                <div class="grid grid-cols-3 gap-3 text-center">
                    <div><p class="text-xs text-gray-400">Esfera</p><p class="font-medium">{{ $receta->od_esfera ?? '—' }}</p></div>
                    <div><p class="text-xs text-gray-400">Cilindro</p><p class="font-medium">{{ $receta->od_cilindro ?? '—' }}</p></div>
                    <div><p class="text-xs text-gray-400">Eje</p><p class="font-medium">{{ $receta->od_eje ?? '—' }}</p></div>
                </div>
            </div>
            <div class="border border-gray-100 rounded-lg p-4">
                <p class="text-sm font-semibold text-gray-700 mb-3">Ojo Izquierdo (OI)</p>
                <div class="grid grid-cols-3 gap-3 text-center">
                    <div><p class="text-xs text-gray-400">Esfera</p><p class="font-medium">{{ $receta->oi_esfera ?? '—' }}</p></div>
                    <div><p class="text-xs text-gray-400">Cilindro</p><p class="font-medium">{{ $receta->oi_cilindro ?? '—' }}</p></div>
                    <div><p class="text-xs text-gray-400">Eje</p><p class="font-medium">{{ $receta->oi_eje ?? '—' }}</p></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Adición</p>
                <p class="text-gray-900 font-medium">{{ $receta->adicion ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Distancia pupilar</p>
                <p class="text-gray-900 font-medium">{{ $receta->distancia_pupilar ?? '—' }} mm</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Vigencia hasta</p>
                <p class="text-gray-900 font-medium">{{ $receta->vigencia_hasta?->format('d/m/Y') ?? '—' }}</p>
            </div>
        </div>

        @if ($receta->diagnostico)
            <div class="mb-4">
                <p class="text-xs text-gray-400 uppercase tracking-wide">Diagnóstico</p>
                <p class="text-gray-700">{{ $receta->diagnostico }}</p>
            </div>
        @endif

        @if ($receta->observaciones)
            <div class="mb-4">
                <p class="text-xs text-gray-400 uppercase tracking-wide">Observaciones</p>
                <p class="text-gray-700">{{ $receta->observaciones }}</p>
            </div>
        @endif

        <div class="flex items-center gap-3 mt-6">
            <a href="{{ route('recetas.edit', $receta) }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Editar
            </a>
            <a href="{{ route('recetas.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                Volver
            </a>
        </div>
    </div>

@endsection