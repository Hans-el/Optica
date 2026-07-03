<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LenteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // $this->lente existe solo en update (viene del route model binding)
        $lenteId = $this->route('lente')?->id;

        return [
            'marca_id' => ['required', 'exists:marcas,id'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'proveedor_id' => ['nullable', 'exists:proveedores,id'],

            'nombre' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string', 'max:50', Rule::unique('lentes', 'sku')->ignore($lenteId)],
            'descripcion' => ['nullable', 'string'],
            'material' => ['nullable', 'string', 'max:100'],
            'color' => ['nullable', 'string', 'max:100'],
            'genero' => ['nullable', Rule::in(['hombre', 'mujer', 'unisex', 'nino'])],

            'precio' => ['required', 'numeric', 'min:0'],
            'costo' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'stock_minimo' => ['nullable', 'integer', 'min:0'],

            'activo' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'marca_id.required' => 'Selecciona una marca.',
            'categoria_id.required' => 'Selecciona una categoría.',
            'sku.unique' => 'Ese SKU ya está en uso por otro lente.',
            'precio.required' => 'El precio es obligatorio.',
        ];
    }
}