<?php

namespace App\Http\Controllers;

class ReporteController extends Controller
{
    public function index()
    {
        // TODO: aquí luego irán consultas agregadas (ventas por mes, stock bajo, etc.)
        return view('reportes.index');
    }
}