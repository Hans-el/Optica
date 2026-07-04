@php
    $usuario = $usuario ?? null;
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre completo</label>
        <input type="text" name="name" value="{{ old('name', $usuario->name ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $usuario->email ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            {{ $usuario ? 'Nueva contraseña (opcional)' : 'Contraseña' }}
        </label>
        <input type="password" name="password"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        @if ($usuario)
            <p class="text-xs text-gray-400 mt-1">Déjala en blanco para no cambiarla.</p>
        @endif
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
        <select name="rol" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            @foreach (['administrador' => 'Administrador', 'vendedor' => 'Vendedor', 'optometrista' => 'Optometrista'] as $value => $label)
                <option value="{{ $value }}" @selected(old('rol', $usuario->rol ?? 'vendedor') == $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('rol') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono (opcional)</label>
        <input type="text" name="telefono" value="{{ old('telefono', $usuario->telefono ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="activo" value="1" id="activo"
               {{ old('activo', $usuario->activo ?? true) ? 'checked' : '' }}
               class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
        <label for="activo" class="text-sm text-gray-700">Usuario activo</label>
    </div>

</div>