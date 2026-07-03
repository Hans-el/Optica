@extends('layouts.app')

@section('title', 'Lentes')

@section('content')

    {{-- ENCABEZADO --}}
    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Lentes</h1>
            <p class="text-sm text-gray-500 mt-1">
                <a href="{{ url('/') }}" class="hover:underline">Inicio</a> / Lentes
            </p>
        </div>

        <a href="{{ route('lentes.create') }}"
           class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Nuevo Lente
        </a>
    </div>

    {{-- BANNER / HERO --}}
    <div class="relative rounded-2xl overflow-hidden bg-gray-900 h-72 mb-8">
        <img src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=1200&q=80"
             alt="Colección de lentes"
             class="absolute inset-0 w-full h-full object-cover opacity-70">

        <div class="relative h-full flex flex-col justify-center px-10 max-w-lg text-white">
            <span class="text-emerald-400 text-sm font-semibold mb-2">Nueva Colección 2026</span>
            <h2 class="text-4xl font-bold leading-tight mb-3">Estilo, comodidad y protección</h2>
            <p class="text-gray-200 mb-5">Descubre nuestra nueva línea de lentes</p>
            <a href="{{ route('lentes.index') }}"
               class="inline-block w-fit bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Ver colección
            </a>
        </div>

        {{-- Flechas --}}
        <button class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white w-9 h-9 rounded-full flex items-center justify-center transition" aria-label="Anterior">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <button class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white w-9 h-9 rounded-full flex items-center justify-center transition" aria-label="Siguiente">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </button>

        {{-- Dots --}}
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
            <span class="w-2 h-2 rounded-full bg-white/50"></span>
            <span class="w-2 h-2 rounded-full bg-white/50"></span>
            <span class="w-2 h-2 rounded-full bg-white/50"></span>
        </div>
    </div>

    {{-- TITULO + CONTROLES --}}
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-xl font-bold text-gray-900">Todos los lentes</h3>

        <div class="flex items-center gap-3">
            <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white text-gray-600 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option>Más recientes</option>
                <option>Precio: menor a mayor</option>
                <option>Precio: mayor a menor</option>
            </select>

            <div class="flex items-center bg-gray-100 rounded-lg p-1">
                <button class="w-8 h-8 rounded-md bg-emerald-600 text-white flex items-center justify-center" aria-label="Vista en grid">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                </button>
                <button class="w-8 h-8 rounded-md text-gray-500 flex items-center justify-center hover:bg-gray-200" aria-label="Vista en lista">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- GRID DE PRODUCTOS (datos estáticos por ahora, reemplazar por $lentes desde el controlador) --}}
    @php
        $lentes = [
            ['nombre' => 'Ray-Ban Aviator Classic', 'marca' => 'Ray-Ban', 'precio' => 120, 'stock' => 15,
             'img' => 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=500&q=80'],
            ['nombre' => 'Oakley Holbrook', 'marca' => 'Oakley', 'precio' => 150, 'stock' => 8,
             'img' => 'https://images.unsplash.com/photo-1577803645773-f96470509666?w=500&q=80'],
            ['nombre' => 'Carrera Champion', 'marca' => 'Carrera', 'precio' => 98, 'stock' => 20,
             'img' => 'https://images.unsplash.com/photo-1508296695146-257a814070b4?w=500&q=80'],
            ['nombre' => 'Persol PO3172S', 'marca' => 'Persol', 'precio' => 210, 'stock' => 5,
             'img' => 'https://images.unsplash.com/photo-1591076482161-42ce6da69f67?w=500&q=80'],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach ($lentes as $lente)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition">
                <div class="relative bg-gray-50 h-40 flex items-center justify-center">
                    <img src="{{ $lente['img'] }}" alt="{{ $lente['nombre'] }}" class="h-28 object-contain">
                    <span class="absolute top-3 right-3 bg-emerald-50 text-emerald-700 text-[11px] font-semibold px-2 py-1 rounded-full">
                        En stock
                    </span>
                </div>

                <div class="p-4">
                    <h4 class="font-semibold text-gray-900 text-sm">{{ $lente['nombre'] }}</h4>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $lente['marca'] }}</p>

                    <p class="text-emerald-600 font-bold mt-2">${{ number_format($lente['precio'], 2) }}</p>
                    <p class="text-xs text-gray-500">Stock: {{ $lente['stock'] }} unidades</p>

                    <div class="flex items-center gap-2 mt-4">
                        <a href="{{ route('lentes.show', 1) }}"
                           class="flex-1 flex items-center justify-center border border-gray-200 rounded-lg py-2 hover:bg-gray-50 transition" aria-label="Ver">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8Z"/><circle cx="12" cy="12" r="3"/></svg>
                        </a>
                        <a href="{{ route('lentes.edit', 1) }}"
                           class="flex-1 flex items-center justify-center border border-gray-200 rounded-lg py-2 hover:bg-gray-50 transition" aria-label="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5Z"/></svg>
                        </a>
                        <form action="{{ route('lentes.destroy', 1) }}" method="POST" class="flex-1"
                              onsubmit="return confirm('¿Eliminar este lente?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full flex items-center justify-center border border-red-100 rounded-lg py-2 hover:bg-red-50 transition" aria-label="Eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection