<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecetaRequest;
use App\Models\Cliente;
use App\Models\Receta;
use App\Models\User;

class RecetaController extends Controller
{
    public function index()
    {
        $recetas = Receta::with(['cliente', 'optometrista'])
            ->latest('fecha_examen')
            ->paginate(10);

        return view('recetas.index', compact('recetas'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $optometristas = User::whereIn('rol', ['optometrista', 'administrador'])->orderBy('name')->get();

        return view('recetas.create', compact('clientes', 'optometristas'));
    }

    public function store(RecetaRequest $request)
    {
        Receta::create($request->validated());

        return redirect()
            ->route('recetas.index')
            ->with('success', 'Receta registrada correctamente');
    }

    public function show(Receta $receta)
    {
        $receta->load(['cliente', 'optometrista']);

        return view('recetas.show', compact('receta'));
    }

    public function edit(Receta $receta)
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $optometristas = User::whereIn('rol', ['optometrista', 'administrador'])->orderBy('name')->get();

        return view('recetas.edit', compact('receta', 'clientes', 'optometristas'));
    }

    public function update(RecetaRequest $request, Receta $receta)
    {
        $receta->update($request->validated());

        return redirect()
            ->route('recetas.index')
            ->with('success', 'Receta actualizada correctamente');
    }

    public function destroy(Receta $receta)
    {
        $receta->delete();

        return redirect()
            ->route('recetas.index')
            ->with('success', 'Receta eliminada correctamente');
    }
}