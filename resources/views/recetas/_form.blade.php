@php
    $receta = $receta ?? null;
@endphp

{{-- Datos generales --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
    <div class="md:col-span-1">
        <label class="block text-sm font-medium text-gray-700 mb-1">Cliente</label>
        <select name="cliente_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <option value="">Selecciona un cliente</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" @selected(old('cliente_id', $receta->cliente_id ?? null) == $cliente->id)>
                    {{ $cliente->nombre_completo }} — {{ $cliente->cedula }}
                </option>
            @endforeach
        </select>
        @error('cliente_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Optometrista (opcional)</label>
        <select name="optometrista_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <option value="">No especifica</option>
            @foreach ($optometristas as $optometrista)
                <option value="{{ $optometrista->id }}" @selected(old('optometrista_id', $receta->optometrista_id ?? null) == $optometrista->id)>
                    {{ $optometrista->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Fecha del examen</label>
        <input type="date" name="fecha_examen" value="{{ old('fecha_examen', $receta?->fecha_examen?->format('Y-m-d')) }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('fecha_examen') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
</div>

{{-- Graduación --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">

    <div class="border border-gray-100 rounded-lg p-4">
        <p class="text-sm font-semibold text-gray-700 mb-3">Ojo Derecho (OD)</p>
        <div class="grid grid-cols-3 gap-3">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Esfera</label>
                <input type="number" step="0.25" name="od_esfera" value="{{ old('od_esfera', $receta->od_esfera ?? '') }}"
                       class="w-full border border-gray-200 rounded-lg px-2 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Cilindro</label>
                <input type="number" step="0.25" name="od_cilindro" value="{{ old('od_cilindro', $receta->od_cilindro ?? '') }}"
                       class="w-full border border-gray-200 rounded-lg px-2 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Eje</label>
                <input type="number" name="od_eje" value="{{ old('od_eje', $receta->od_eje ?? '') }}"
                       class="w-full border border-gray-200 rounded-lg px-2 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
        </div>
    </div>

    <div class="border border-gray-100 rounded-lg p-4">
        <p class="text-sm font-semibold text-gray-700 mb-3">Ojo Izquierdo (OI)</p>
        <div class="grid grid-cols-3 gap-3">
            <div>
                <label class="block text-xs text-gray-500 mb-1">Esfera</label>
                <input type="number" step="0.25" name="oi_esfera" value="{{ old('oi_esfera', $receta->oi_esfera ?? '') }}"
                       class="w-full border border-gray-200 rounded-lg px-2 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Cilindro</label>
                <input type="number" step="0.25" name="oi_cilindro" value="{{ old('oi_cilindro', $receta->oi_cilindro ?? '') }}"
                       class="w-full border border-gray-200 rounded-lg px-2 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
            <div>
                <label class="block text-xs text-gray-500 mb-1">Eje</label>
                <input type="number" name="oi_eje" value="{{ old('oi_eje', $receta->oi_eje ?? '') }}"
                       class="w-full border border-gray-200 rounded-lg px-2 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
        </div>
    </div>
</div>

{{-- Datos adicionales --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Adición (opcional)</label>
        <input type="number" step="0.25" name="adicion" value="{{ old('adicion', $receta->adicion ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Distancia pupilar (mm)</label>
        <input type="number" step="0.5" name="distancia_pupilar" value="{{ old('distancia_pupilar', $receta->distancia_pupilar ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Vigencia hasta (opcional)</label>
        <input type="date" name="vigencia_hasta" value="{{ old('vigencia_hasta', $receta?->vigencia_hasta?->format('Y-m-d')) }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('vigencia_hasta') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="grid grid-cols-1 gap-5">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Diagnóstico (opcional)</label>
        <input type="text" name="diagnostico" value="{{ old('diagnostico', $receta->diagnostico ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Observaciones (opcional)</label>
        <textarea name="observaciones" rows="3"
                  class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('observaciones', $receta->observaciones ?? '') }}</textarea>
    </div>
</div>