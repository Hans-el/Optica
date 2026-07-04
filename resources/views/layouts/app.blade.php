<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Óptica') | Óptica Visión</title>

    {{-- Ajusta esto según tu setup de Vite/Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <div class="min-h-screen flex flex-col">

        {{-- HEADER --}}
        @include('partials.header')

        <div class="flex flex-1">

            {{-- SIDEBAR --}}
            @include('partials.sidebar')

            {{-- CONTENIDO --}}
            <main class="flex-1 p-8 overflow-y-auto">
                @yield('content')
            </main>

        </div>
    </div>

    @stack('scripts')

</body>
</html>