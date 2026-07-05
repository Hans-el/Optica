@extends('layouts.guest')

@section('title', 'Iniciar sesión')

@section('content')

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
        <h1 class="text-xl font-bold text-gray-900 mb-1">Iniciar sesión</h1>
        <p class="text-sm text-gray-500 mb-6">Ingresa tus credenciales para continuar</p>

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" autofocus
                       class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <input type="password" name="password"
                       class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="recordar" id="recordar" value="1"
                       class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                <label for="recordar" class="text-sm text-gray-600">Recordarme</label>
            </div>

            <button type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold py-2.5 rounded-lg transition">
                Ingresar
            </button>
        </form>
    </div>

@endsection