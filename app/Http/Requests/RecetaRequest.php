<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecetaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente_id' => ['required', 'exists:clientes,id'],
            'optometrista_id' => ['nullable', 'exists:users,id'],

            'fecha_examen' => ['required', 'date', 'before_or_equal:today'],
            'vigencia_hasta' => ['nullable', 'date', 'after:fecha_examen'],

            'od_esfera' => ['nullable', 'numeric', 'between:-30,30'],
            'od_cilindro' => ['nullable', 'numeric', 'between:-30,30'],
            'od_eje' => ['nullable', 'integer', 'between:0,180'],

            'oi_esfera' => ['nullable', 'numeric', 'between:-30,30'],
            'oi_cilindro' => ['nullable', 'numeric', 'between:-30,30'],
            'oi_eje' => ['nullable', 'integer', 'between:0,180'],

            'adicion' => ['nullable', 'numeric', 'between:0,10'],
            'distancia_pupilar' => ['nullable', 'numeric', 'between:40,80'],

            'diagnostico' => ['nullable', 'string', 'max:255'],
            'observaciones' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'cliente_id.required' => 'Selecciona un cliente.',
            'vigencia_hasta.after' => 'La vigencia debe ser posterior a la fecha del examen.',
        ];
    }
}