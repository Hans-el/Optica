@php
    $proveedor = $proveedor ?? null;
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre de la empresa</label>
        <input type="text" name="nombre" value="{{ old('nombre', $proveedor->nombre ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('nombre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Persona de contacto (opcional)</label>
        <input type="text" name="nombre_contacto" value="{{ old('nombre_contacto', $proveedor->nombre_contacto ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono (opcional)</label>
        <input type="text" name="telefono" value="{{ old('telefono', $proveedor->telefono ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email (opcional)</label>
        <input type="email" name="email" value="{{ old('email', $proveedor->email ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">RUC (opcional)</label>
        <input type="text" name="ruc" value="{{ old('ruc', $proveedor->ruc ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('ruc') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Dirección (opcional)</label>
        <input type="text" name="direccion" value="{{ old('direccion', $proveedor->direccion ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>

    <div class="flex items-center gap-2 md:col-span-2">
        <input type="checkbox" name="activo" value="1" id="activo"
               {{ old('activo', $proveedor->activo ?? true) ? 'checked' : '' }}
               class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
        <label for="activo" class="text-sm text-gray-700">Proveedor activo</label>
    </div>

</div>