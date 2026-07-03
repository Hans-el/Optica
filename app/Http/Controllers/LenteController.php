<?php

namespace App\Http\Controllers;

use App\Http\Requests\LenteRequest;
use App\Models\Categoria;
use App\Models\Lente;
use App\Models\Marca;
use App\Models\Proveedor;

class LenteController extends Controller
{
    public function index()
    {
        $lentes = Lente::with(['marca', 'categoria'])
            ->latest()
            ->paginate(12);

        return view('lentes.index', compact('lentes'));
    }

    public function create()
    {
        $marcas = Marca::where('activo', true)->orderBy('nombre')->get();
        $categorias = Categoria::where('activo', true)->orderBy('nombre')->get();
        $proveedores = Proveedor::where('activo', true)->orderBy('nombre')->get();

        return view('lentes.create', compact('marcas', 'categorias', 'proveedores'));
    }

    public function store(LenteRequest $request)
    {
        Lente::create($request->validated());

        return redirect()
            ->route('lentes.index')
            ->with('success', 'Lente creado correctamente');
    }

    public function show(Lente $lente)
    {
        $lente->load(['marca', 'categoria', 'proveedor']);

        return view('lentes.show', compact('lente'));
    }

    public function edit(Lente $lente)
    {
        $marcas = Marca::where('activo', true)->orderBy('nombre')->get();
        $categorias = Categoria::where('activo', true)->orderBy('nombre')->get();
        $proveedores = Proveedor::where('activo', true)->orderBy('nombre')->get();

        return view('lentes.edit', compact('lente', 'marcas', 'categorias', 'proveedores'));
    }

    public function update(LenteRequest $request, Lente $lente)
    {
        $lente->update($request->validated());

        return redirect()
            ->route('lentes.index')
            ->with('success', 'Lente actualizado correctamente');
    }

    public function destroy(Lente $lente)
    {
        $lente->delete(); // soft delete, no se pierde el historial de ventas asociado

        return redirect()
            ->route('lentes.index')
            ->with('success', 'Lente eliminado correctamente');
    }
}