@extends("layouts.app")

@section("title", $marca->nombre)

@section("content")

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $marca->nombre }}</h1>
        <p class="text-sm text-gray-500 mt-1">
            <a href="{{ route('marcas.index') }}" class="hover:underline">Marcas</a> / {{ $marca->nombre }}
        </p>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 p-6 max-w-lg">
        <p class="text-xs text-gray-400 uppercase tracking-wide">Descripción</p>
        <p class="text-gray-700 mt-1 mb-4">{{ $marca->descripcion ?? "—" }}</p>

        <div class="bg-emerald-50 rounded-lg p-4 text-center max-w-60px">
            <p class="text-2xl font-bold text-emerald-700">{{ $marca->lentes_count }}</p>
            <p class="text-xs text-gray-500 mt-1">Lentes asociados</p>
        </div>

        <div class="flex items-center gap-3 mt-6">
            <a href="{{ route('marcas.edit', $marca) }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Editar
            </a>
            <a href="{{ route('marcas.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                Volver
            </a>
        </div>
    </div>

@endsection