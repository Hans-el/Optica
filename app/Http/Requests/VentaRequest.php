<?php

namespace App\Http\Requests;

use App\Models\Lente;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class VentaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente_id' => ['required', 'exists:clientes,id'],
            'receta_id' => ['nullable', 'exists:recetas,id'],
            'metodo_pago' => ['required', Rule::in(['efectivo', 'tarjeta', 'transferencia', 'mixto'])],
            'descuento' => ['nullable', 'numeric', 'min:0'],
            'notas' => ['nullable', 'string'],

            'items' => ['required', 'array', 'min:1'],
            'items.*.lente_id' => ['required', 'exists:lentes,id'],
            'items.*.cantidad' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'cliente_id.required' => 'Selecciona un cliente.',
            'items.required' => 'Agrega al menos un lente a la venta.',
            'items.min' => 'Agrega al menos un lente a la venta.',
            'items.*.lente_id.required' => 'Selecciona un lente en todas las líneas.',
            'items.*.cantidad.min' => 'La cantidad debe ser al menos 1.',
        ];
    }

    /**
     * Validaciones adicionales que necesitan revisar varias filas juntas:
     * stock suficiente y que no se repita el mismo lente en dos líneas.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            $items = $this->input('items', []);
            $vistos = [];

            foreach ($items as $index => $item) {
                if (empty($item['lente_id']) || empty($item['cantidad'])) {
                    continue;
                }

                // Lente repetido en dos líneas distintas
                if (in_array($item['lente_id'], $vistos)) {
                    $validator->errors()->add(
                        "items.$index.lente_id",
                        'Este lente ya está agregado en otra línea. Suma la cantidad ahí en vez de duplicarlo.'
                    );
                }
                $vistos[] = $item['lente_id'];

                // Stock suficiente
                $lente = Lente::find($item['lente_id']);
                if ($lente && $item['cantidad'] > $lente->stock) {
                    $validator->errors()->add(
                        "items.$index.cantidad",
                        "Solo hay {$lente->stock} unidades disponibles de \"{$lente->nombre}\"."
                    );
                }
            }
        });
    }
}