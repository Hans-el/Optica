<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        // TODO: reemplazar por Marca::all() cuando el modelo esté listo
        $marcas = [
            ['id' => 1, 'nombre' => 'Ray-Ban', 'descripcion' => 'Marca clásica de lentes de sol y oftálmicos'],
            ['id' => 2, 'nombre' => 'Oakley', 'descripcion' => 'Lentes deportivos y de alto rendimiento'],
            ['id' => 3, 'nombre' => 'Carrera', 'descripcion' => 'Diseño urbano y deportivo'],
            ['id' => 4, 'nombre' => 'Persol', 'descripcion' => 'Lentes artesanales italianos'],
        ];

        return view('marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function store(Request $request)
    {
        // TODO: validar y guardar con Marca::create($request->validated())

        return redirect()->route('marcas.index')->with('success', 'Marca creada correctamente');
    }

    public function show(string $id)
    {
        // TODO: reemplazar por Marca::findOrFail($id)
        $marca = ['id' => $id, 'nombre' => 'Ray-Ban', 'descripcion' => 'Marca clásica de lentes de sol y oftálmicos'];

        return view('marcas.show', compact('marca'));
    }

    public function edit(string $id)
    {
        $marca = ['id' => $id, 'nombre' => 'Ray-Ban', 'descripcion' => 'Marca clásica de lentes de sol y oftálmicos'];

        return view('marcas.edit', compact('marca'));
    }

    public function update(Request $request, string $id)
    {
        // TODO: validar y actualizar

        return redirect()->route('marcas.index')->with('success', 'Marca actualizada correctamente');
    }

    public function destroy(string $id)
    {
        // TODO: eliminar registro

        return redirect()->route('marcas.index')->with('success', 'Marca eliminada correctamente');
    }
}