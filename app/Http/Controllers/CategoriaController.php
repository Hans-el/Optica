<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        // TODO: reemplazar por Categoria::all()
        $categorias = [
            ['id' => 1, 'nombre' => 'Sol', 'descripcion' => 'Lentes de sol'],
            ['id' => 2, 'nombre' => 'Oftálmicos', 'descripcion' => 'Lentes con graduación'],
            ['id' => 3, 'nombre' => 'Deportivos', 'descripcion' => 'Lentes para actividad física'],
        ];

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente');
    }

    public function show(string $id)
    {
        $categoria = ['id' => $id, 'nombre' => 'Sol', 'descripcion' => 'Lentes de sol'];

        return view('categorias.show', compact('categoria'));
    }

    public function edit(string $id)
    {
        $categoria = ['id' => $id, 'nombre' => 'Sol', 'descripcion' => 'Lentes de sol'];

        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(string $id)
    {
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente');
    }
}