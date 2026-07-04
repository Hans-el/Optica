@extends('layouts.app')

@section('title', 'Recetas')

@section('content')

    @if (session('success'))
        <div class="mb-6 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Recetas</h1>
            <p class="text-sm text-gray-500 mt-1">
                <a href="{{ url('/') }}" class="hover:underline">Inicio</a> / Recetas
            </p>
        </div>

        <a href="{{ route('recetas.create') }}"
           class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Nueva Receta
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="text-left px-5 py-3 font-medium">Cliente</th>
                    <th class="text-left px-5 py-3 font-medium">Fecha examen</th>
                    <th class="text-left px-5 py-3 font-medium">Optometrista</th>
                    <th class="text-left px-5 py-3 font-medium">Vigencia hasta</th>
                    <th class="text-right px-5 py-3 font-medium">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($recetas as $receta)
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3 font-medium text-gray-900">{{ $receta->cliente->nombre_completo }}</td>
                        <td class="px-5 py-3 text-gray-600">{{ $receta->fecha_examen->format('d/m/Y') }}</td>
                        <td class="px-5 py-3 text-gray-600">{{ $receta->optometrista->name ?? '—' }}</td>
                        <td class="px-5 py-3 text-gray-600">
                            @if ($receta->vigencia_hasta)
                                <span class="{{ $receta->vigencia_hasta->isPast() ? 'text-red-500' : 'text-gray-600' }}">
                                    {{ $receta->vigencia_hasta->format('d/m/Y') }}
                                </span>
                            @else
                                —
                            @endif
                        </td>
                        <td class="px-5 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('recetas.show', $receta) }}" class="p-2 rounded-lg border border-gray-200 hover:bg-gray-100" aria-label="Ver">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8Z"/><circle cx="12" cy="12" r="3"/></svg>
                                </a>
                                <a href="{{ route('recetas.edit', $receta) }}" class="p-2 rounded-lg border border-gray-200 hover:bg-gray-100" aria-label="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5Z"/></svg>
                                </a>
                                <form action="{{ route('recetas.destroy', $receta) }}" method="POST" onsubmit="return confirm('¿Eliminar esta receta?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg border border-red-100 hover:bg-red-50" aria-label="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-10 text-center text-gray-400">
                            No hay recetas registradas todavía.
                            <a href="{{ route('recetas.create') }}" class="text-emerald-700 font-medium hover:underline">Crea la primera</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $recetas->links() }}
    </div>

@endsection