<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function show()
    {
        $usuario = auth()->user();

        return view('profile.show', compact('usuario'));
    }
}