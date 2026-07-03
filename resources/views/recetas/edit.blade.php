@extends("layouts.app")

@section("title", ucfirst("recetas"))

@section("content")
    <h1 class="text-3xl font-bold text-gray-900 capitalize mb-6">edit - recetas</h1>

    <div class="bg-white rounded-xl border border-gray-100 p-8 text-center text-gray-400">
        Vista en construcción — mismo patrón que "clientes/edit.blade.php".
    </div>

    <a href="{{ route('recetas.index') }}" class="inline-block mt-4 text-sm text-emerald-700 hover:underline">
        &larr; Volver a recetas
    </a>
@endsection