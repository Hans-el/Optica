@php
    $lente = $lente ?? null;
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    {{-- Nombre --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $lente->nombre ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('nombre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- SKU --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">SKU (código interno)</label>
        <input type="text" name="sku" value="{{ old('sku', $lente->sku ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('sku') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Marca --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Marca</label>
        <select name="marca_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <option value="">Selecciona una marca</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" @selected(old('marca_id', $lente->marca_id ?? null) == $marca->id)>
                    {{ $marca->nombre }}
                </option>
            @endforeach
        </select>
        @error('marca_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Categoría --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
        <select name="categoria_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <option value="">Selecciona una categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" @selected(old('categoria_id', $lente->categoria_id ?? null) == $categoria->id)>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
        @error('categoria_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Proveedor --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Proveedor (opcional)</label>
        <select name="proveedor_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <option value="">Sin proveedor</option>
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}" @selected(old('proveedor_id', $lente->proveedor_id ?? null) == $proveedor->id)>
                    {{ $proveedor->nombre }}
                </option>
            @endforeach
        </select>
        @error('proveedor_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Género --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Género</label>
        <select name="genero" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <option value="">No especifica</option>
            @foreach (['hombre' => 'Hombre', 'mujer' => 'Mujer', 'unisex' => 'Unisex', 'nino' => 'Niño'] as $value => $label)
                <option value="{{ $value }}" @selected(old('genero', $lente->genero ?? null) == $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    {{-- Material --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Material</label>
        <input type="text" name="material" value="{{ old('material', $lente->material ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>

    {{-- Color --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Color</label>
        <input type="text" name="color" value="{{ old('color', $lente->color ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>

    {{-- Precio --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Precio de venta ($)</label>
        <input type="number" step="0.01" name="precio" value="{{ old('precio', $lente->precio ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('precio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Costo --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Costo ($) (opcional)</label>
        <input type="number" step="0.01" name="costo" value="{{ old('costo', $lente->costo ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>

    {{-- Stock --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Stock (unidades)</label>
        <input type="number" name="stock" value="{{ old('stock', $lente->stock ?? 0) }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('stock') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Stock mínimo --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Stock mínimo (alerta)</label>
        <input type="number" name="stock_minimo" value="{{ old('stock_minimo', $lente->stock_minimo ?? 5) }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>

    {{-- Descripción --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Descripción (opcional)</label>
        <textarea name="descripcion" rows="3"
                  class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('descripcion', $lente->descripcion ?? '') }}</textarea>
    </div>

</div>