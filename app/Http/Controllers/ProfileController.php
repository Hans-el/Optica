<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        // TODO: usar auth()->user() cuando tengas autenticación implementada
        return view('profile.show');
    }
}