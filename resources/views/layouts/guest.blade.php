<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Óptica')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-sm">
        <div class="flex items-center justify-center gap-3 mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-[#0F3D2A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="6" cy="15" r="3.5"/><circle cx="18" cy="15" r="3.5"/><path d="M9.5 15h5"/><path d="M2 12l1.5-4"/><path d="M22 12l-1.5-4"/>
            </svg>
            <div class="leading-tight">
                <p class="font-bold tracking-wide text-lg text-[#0F3D2A]">ÓPTICA</p>
                <p class="text-[11px] text-gray-500 -mt-1">Visión perfecta para ti</p>
            </div>
        </div>

        @yield('content')
    </div>
</body>
</html>