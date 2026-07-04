<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $clienteId = $this->route('cliente')?->id;

        return [
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],

            // Validación simple de formato (10 dígitos). No verifica el dígito
            // verificador real de cédula ecuatoriana; se puede reforzar después
            // con una regla custom si lo necesitas.
            'cedula' => [
                'required',
                'digits:10',
                Rule::unique('clientes', 'cedula')->ignore($clienteId),
            ],

            'telefono' => ['nullable', 'string', 'max:20'],
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('clientes', 'email')->ignore($clienteId),
            ],
            'direccion' => ['nullable', 'string', 'max:255'],
            'fecha_nacimiento' => ['nullable', 'date', 'before:today'],
            'genero' => ['nullable', Rule::in(['masculino', 'femenino', 'otro'])],
        ];
    }

    public function messages(): array
    {
        return [
            'cedula.digits' => 'La cédula debe tener 10 dígitos.',
            'cedula.unique' => 'Ya existe un cliente con esa cédula.',
            'email.unique' => 'Ya existe un cliente con ese email.',
        ];
    }
}