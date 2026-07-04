<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $usuarioId = $this->route('usuario')?->id;
        $esCreacion = $this->isMethod('POST');

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($usuarioId)],

            // En creación la contraseña es obligatoria; en edición es opcional
            // (si se deja vacía, se conserva la actual)
            'password' => [$esCreacion ? 'required' : 'nullable', Password::min(8)],

            'rol' => ['required', Rule::in(['administrador', 'vendedor', 'optometrista'])],
            'telefono' => ['nullable', 'string', 'max:20'],
            'activo' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Ya existe un usuario con ese email.',
            'password.required' => 'La contraseña es obligatoria para un nuevo usuario.',
        ];
    }
}