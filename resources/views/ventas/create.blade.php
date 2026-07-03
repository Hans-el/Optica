@extends("layouts.app")

@section("title", ucfirst("ventas"))

@section("content")
    <h1 class="text-3xl font-bold text-gray-900 capitalize mb-6">create - ventas</h1>

    <div class="bg-white rounded-xl border border-gray-100 p-8 text-center text-gray-400">
        Vista en construcción — mismo patrón que "clientes/create.blade.php".
    </div>

    <a href="{{ route('ventas.index') }}" class="inline-block mt-4 text-sm text-emerald-700 hover:underline">
        &larr; Volver a ventas
    </a>
@endsection