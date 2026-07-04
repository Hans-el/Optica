@php
    $marca = $marca ?? null;
@endphp

<div class="grid grid-cols-1 gap-5">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $marca->nombre ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error("nombre") <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Descripción (opcional)</label>
        <textarea name="descripcion" rows="3"
                  class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old("descripcion", $marca->descripcion ?? "") }}</textarea>
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="activo" value="1" id="activo"
               {{ old('activo', $marca->activo ?? true) ? 'checked' : '' }}
               class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
        <label for="activo" class="text-sm text-gray-700">Marca activa</label>
    </div>
</div>