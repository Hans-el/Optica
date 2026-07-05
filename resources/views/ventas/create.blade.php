@extends('layouts.app')

@section('title', 'Nueva Venta')

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Nueva Venta</h1>
        <p class="text-sm text-gray-500 mt-1">
            <a href="{{ route('ventas.index') }}" class="hover:underline">Ventas</a> / Nueva
        </p>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3">
            <p class="font-medium mb-1">Revisa los siguientes errores:</p>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ventas.store') }}" method="POST" id="form-venta" class="max-w-4xl">
        @csrf

        {{-- DATOS GENERALES --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cliente</label>
                    <select name="cliente_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Selecciona un cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}" @selected(old('cliente_id') == $cliente->id)>
                                {{ $cliente->nombre_completo }} — {{ $cliente->cedula }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Receta asociada (opcional)</label>
                    <select name="receta_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Sin receta</option>
                        @foreach ($recetas as $receta)
                            <option value="{{ $receta->id }}" @selected(old('receta_id') == $receta->id)>
                                {{ $receta->cliente->nombre_completo }} — {{ $receta->fecha_examen->format('d/m/Y') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Método de pago</label>
                    <select name="metodo_pago" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        @foreach (['efectivo' => 'Efectivo', 'tarjeta' => 'Tarjeta', 'transferencia' => 'Transferencia', 'mixto' => 'Mixto'] as $value => $label)
                            <option value="{{ $value }}" @selected(old('metodo_pago') == $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descuento general ($, opcional)</label>
                    <input type="number" step="0.01" name="descuento" id="descuento" value="{{ old('descuento', 0) }}"
                           class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
        </div>

        {{-- LÍNEAS DE LENTES --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6 mb-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-semibold text-gray-900">Lentes de la venta</h3>
                <button type="button" id="btn-agregar-linea"
                        class="text-sm font-medium text-emerald-700 hover:underline">
                    + Agregar línea
                </button>
            </div>

            <div id="contenedor-lineas" class="space-y-3"></div>

            <template id="plantilla-linea">
                <div class="linea-venta grid grid-cols-12 gap-3 items-start border border-gray-100 rounded-lg p-3">
                    <div class="col-span-6">
                        <select name="items[__INDEX__][lente_id]" class="select-lente w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option value="">Selecciona un lente</option>
                            @foreach ($lentes as $lente)
                                <option value="{{ $lente->id }}" data-precio="{{ $lente->precio }}" data-stock="{{ $lente->stock }}">
                                    {{ $lente->nombre }} ({{ $lente->sku }}) — ${{ number_format($lente->precio, 2) }} · Stock: {{ $lente->stock }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <input type="number" name="items[__INDEX__][cantidad]" min="1" value="1"
                               class="input-cantidad w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Cant.">
                    </div>
                    <div class="col-span-3 flex items-center h-9.5 text-sm font-medium text-gray-700 subtotal-linea">
                        $0.00
                    </div>
                    <div class="col-span-1 flex items-center h-9.5">
                        <button type="button" class="btn-quitar-linea text-red-400 hover:text-red-600" aria-label="Quitar línea">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>
            </template>

            <p id="mensaje-sin-lineas" class="text-sm text-gray-400 mt-2">Aún no has agregado ningún lente.</p>
        </div>

        {{-- TOTALES (referenciales, el cálculo real y definitivo lo hace el servidor) --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6 mb-6 max-w-sm ml-auto">
            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span>Subtotal</span>
                <span id="resumen-subtotal">$0.00</span>
            </div>
            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span>Descuento</span>
                <span id="resumen-descuento">$0.00</span>
            </div>
            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span>IVA (15%)</span>
                <span id="resumen-iva">$0.00</span>
            </div>
            <div class="flex justify-between text-base font-bold text-gray-900 pt-2 border-t border-gray-100">
                <span>Total estimado</span>
                <span id="resumen-total" class="text-emerald-700">$0.00</span>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Registrar Venta
            </button>
            <a href="{{ route('ventas.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                Cancelar
            </a>
        </div>
    </form>

@endsection

@push('scripts')
<script>
(function () {
    const contenedor = document.getElementById('contenedor-lineas');
    const plantilla = document.getElementById('plantilla-linea');
    const mensajeSinLineas = document.getElementById('mensaje-sin-lineas');
    const btnAgregar = document.getElementById('btn-agregar-linea');
    const inputDescuento = document.getElementById('descuento');
    let indice = 0;

    function agregarLinea() {
        const html = plantilla.innerHTML.replaceAll('__INDEX__', indice);
        const wrapper = document.createElement('div');
        wrapper.innerHTML = html;
        const nodo = wrapper.firstElementChild;
        contenedor.appendChild(nodo);
        indice++;

        nodo.querySelector('.select-lente').addEventListener('change', recalcular);
        nodo.querySelector('.input-cantidad').addEventListener('input', recalcular);
        nodo.querySelector('.btn-quitar-linea').addEventListener('click', function () {
            nodo.remove();
            recalcular();
        });

        mensajeSinLineas.classList.add('hidden');
        recalcular();
    }

    function recalcular() {
        let subtotal = 0;

        document.querySelectorAll('.linea-venta').forEach(function (linea) {
            const select = linea.querySelector('.select-lente');
            const opcion = select.options[select.selectedIndex];
            const cantidadInput = linea.querySelector('.input-cantidad');
            const subtotalEl = linea.querySelector('.subtotal-linea');

            const precio = opcion ? parseFloat(opcion.dataset.precio || 0) : 0;
            const stock = opcion ? parseInt(opcion.dataset.stock || 0) : 0;
            let cantidad = parseInt(cantidadInput.value || 0);

            if (stock && cantidad > stock) {
                cantidadInput.value = stock;
                cantidad = stock;
            }

            const subtotalLinea = precio * cantidad;
            subtotalEl.textContent = '$' + subtotalLinea.toFixed(2);
            subtotal += subtotalLinea;
        });

        const descuento = parseFloat(inputDescuento.value || 0);
        const baseImponible = Math.max(subtotal - descuento, 0);
        const iva = baseImponible * 0.15;
        const total = baseImponible + iva;

        document.getElementById('resumen-subtotal').textContent = '$' + subtotal.toFixed(2);
        document.getElementById('resumen-descuento').textContent = '$' + descuento.toFixed(2);
        document.getElementById('resumen-iva').textContent = '$' + iva.toFixed(2);
        document.getElementById('resumen-total').textContent = '$' + total.toFixed(2);
    }

    btnAgregar.addEventListener('click', agregarLinea);
    inputDescuento.addEventListener('input', recalcular);

    // Arranca con una línea lista para usar
    agregarLinea();
})();
</script>
@endpush