<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
{
    return view('pages.inicio',[
        'nombre' => 'Hansel'
    ]);
}
}
