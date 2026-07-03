<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function index()
    {
        // TODO: reemplazar por Receta::with('cliente')->all()
        $recetas = [
            ['id' => 1, 'cliente' => 'María Gómez', 'medico' => 'Dr. Andrade', 'od' => '-1.25', 'oi' => '-1.00', 'fecha' => '2026-06-20'],
            ['id' => 2, 'cliente' => 'Carlos Pérez', 'medico' => 'Dra. Vélez', 'od' => '-2.00', 'oi' => '-1.75', 'fecha' => '2026-06-25'],
        ];

        return view('recetas.index', compact('recetas'));
    }

    public function create()
    {
        return view('recetas.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('recetas.index')->with('success', 'Receta registrada correctamente');
    }

    public function show(string $id)
    {
        $receta = ['id' => $id, 'cliente' => 'María Gómez', 'medico' => 'Dr. Andrade', 'od' => '-1.25', 'oi' => '-1.00', 'fecha' => '2026-06-20'];

        return view('recetas.show', compact('receta'));
    }

    public function edit(string $id)
    {
        $receta = ['id' => $id, 'cliente' => 'María Gómez', 'medico' => 'Dr. Andrade', 'od' => '-1.25', 'oi' => '-1.00', 'fecha' => '2026-06-20'];

        return view('recetas.edit', compact('receta'));
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('recetas.index')->with('success', 'Receta actualizada correctamente');
    }

    public function destroy(string $id)
    {
        return redirect()->route('recetas.index')->with('success', 'Receta eliminada correctamente');
    }
}