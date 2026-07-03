<header class="bg-[#0F3D2A] text-white sticky top-0 z-30">
    <div class="flex items-center justify-between px-6 py-3">

        {{-- LOGO --}}
        <a href="{{ route('inicio') ?? '/' }}" class="flex items-center gap-3 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="6" cy="15" r="3.5"/>
                <circle cx="18" cy="15" r="3.5"/>
                <path d="M9.5 15h5"/>
                <path d="M2 12l1.5-4"/>
                <path d="M22 12l-1.5-4"/>
            </svg>
            <div class="leading-tight">
                <p class="font-bold tracking-wide text-lg">ÓPTICA</p>
                <p class="text-[11px] text-emerald-200 -mt-1">Visión perfecta para ti</p>
            </div>
        </a>

        {{-- NAV --}}
        <nav class="hidden lg:flex items-center gap-1 bg-white/0 text-sm font-medium">
            @php
                $navItems = [
                    'inicio'      => 'Inicio',
                    'lentes'      => 'Lentes',
                    'marcas'      => 'Marcas',
                    'categorias'  => 'Categorías',
                    'nosotros'    => 'Nosotros',
                    'contacto'    => 'Contacto',
                ];
            @endphp

            @foreach ($navItems as $slug => $label)
                @php $active = request()->routeIs($slug . '.*') || request()->is($slug); @endphp
                <a href="{{ url($slug) }}"
                   class="px-4 py-2 rounded-md transition
                          {{ $active ? 'bg-[#145C3C] text-white' : 'text-emerald-100 hover:bg-white/10' }}">
                    {{ $label }}
                </a>
            @endforeach
        </nav>

        {{-- ICONOS DERECHA --}}
        <div class="flex items-center gap-4 shrink-0">
            <button class="hover:text-emerald-200 transition" aria-label="Buscar">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="7"/>
                    <path d="m21 21-4.3-4.3"/>
                </svg>
            </button>

            <button class="relative hover:text-emerald-200 transition" aria-label="Notificaciones">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                </svg>
                <span class="absolute -top-1.5 -right-1.5 bg-emerald-400 text-[#0F3D2A] text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center">
                    3
                </span>
            </button>

            <a href="{{ route('acercade') ?? '#' }}" class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#0F3D2A]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M4 21c0-4 4-6 8-6s8 2 8 6"/>
                </svg>
            </a>
        </div>
    </div>
</header>