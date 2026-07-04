<aside class="hidden md:flex flex-col w-64 shrink-0 bg-white border-r border-gray-200 p-4">

    <nav class="flex-1 space-y-1">
        @php
            // slug => [label, icon-path (heroicon outline "d" attribute), route base]
            $menu = [
                ['slug' => 'lentes',        'label' => 'Lentes',       'icon' => 'glasses'],
                ['slug' => 'marcas',        'label' => 'Marcas',       'icon' => 'star'],
                ['slug' => 'categorias',    'label' => 'Categorías',   'icon' => 'grid'],
                ['slug' => 'proveedores',   'label' => 'Proveedores',  'icon' => 'truck'],
                ['slug' => 'clientes',      'label' => 'Clientes',     'icon' => 'users'],
                ['slug' => 'ventas',        'label' => 'Ventas',       'icon' => 'card'],
                ['slug' => 'recetas',       'label' => 'Recetas',      'icon' => 'doc'],
                ['slug' => 'reportes',      'label' => 'Reportes',     'icon' => 'chart'],
                ['slug' => 'usuarios',      'label' => 'Usuarios',     'icon' => 'user'],
                ['slug' => 'configuracion', 'label' => 'Configuración','icon' => 'settings'],
            ];
        @endphp

        @foreach ($menu as $item)
            @php $active = request()->routeIs($item['slug'] . '.*') || request()->is($item['slug']); @endphp
            <a href="{{ route($item['slug'] . '.index') ?? '#' }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      {{ $active ? 'bg-emerald-50 text-emerald-800' : 'text-gray-600 hover:bg-gray-50' }}">

                {{-- Icono --}}
                <span class="w-5 h-5 shrink-0 {{ $active ? 'text-emerald-700' : 'text-gray-400' }}">
                    @switch($item['icon'])
                        @case('glasses')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="15" r="3.5"/><circle cx="18" cy="15" r="3.5"/><path d="M9.5 15h5"/><path d="M2 12l1.5-4"/><path d="M22 12l-1.5-4"/></svg>
                            @break
                        @case('star')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2Z"/></svg>
                            @break
                        @case('grid')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                            @break
                        @case('truck')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 3h15v13H1z"/><path d="M16 8h4l3 3v5h-7V8Z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                            @break
                        @case('users')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            @break
                        @case('card')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2"/><path d="M1 10h22"/></svg>
                            @break
                        @case('doc')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M9 13h6"/><path d="M9 17h6"/></svg>
                            @break
                        @case('chart')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
                            @break
                        @case('user')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>
                            @break
                        @case('settings')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1Z"/></svg>
                            @break
                    @endswitch
                </span>

                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>

    {{-- TARJETA DE AYUDA --}}
    <div class="mt-6 rounded-xl bg-emerald-50 p-4 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="6" cy="15" r="3.5"/><circle cx="18" cy="15" r="3.5"/><path d="M9.5 15h5"/><path d="M2 12l1.5-4"/><path d="M22 12l-1.5-4"/>
        </svg>
        <p class="mt-2 font-semibold text-gray-800 text-sm">¿Necesitas ayuda?</p>
        <p class="text-xs text-gray-500 mt-1">Estamos para ayudarte</p>
        <a href="{{ route('contacto') ?? '#' }}"
           class="mt-3 inline-block w-full rounded-lg border border-emerald-600 text-emerald-700 text-xs font-semibold py-2 hover:bg-emerald-100 transition">
            Contactar soporte
        </a>
    </div>
</aside>