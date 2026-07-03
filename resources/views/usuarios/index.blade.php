@extends("layouts.app")

@section("title", ucfirst("usuarios"))

@section("content")
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-900 capitalize">usuarios</h1>
        <a href="{{ route('usuarios.create') }}"
           class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition">
            + Nuevo
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 p-8 text-center text-gray-400">
        Vista en construcción — próximamente el listado de usuarios con el mismo diseño que "Lentes".
    </div>
@endsection