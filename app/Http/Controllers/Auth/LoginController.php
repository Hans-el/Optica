<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Bloquea el login de usuarios marcados como inactivos
        $usuario = \App\Models\User::where('email', $credentials['email'])->first();
        if ($usuario && ! $usuario->activo) {
            throw ValidationException::withMessages([
                'email' => 'Este usuario está inactivo. Contacta a un administrador.',
            ]);
        }

        if (! Auth::attempt($credentials, $request->boolean('recordar'))) {
            throw ValidationException::withMessages([
                'email' => 'Las credenciales no coinciden con ningún registro.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('lentes.index'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}