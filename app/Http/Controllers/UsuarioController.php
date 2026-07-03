<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        // TODO: reemplazar por User::all() (o Usuario::all() si usas modelo propio)
        $usuarios = [
            ['id' => 1, 'nombre' => 'Admin Principal', 'email' => 'admin@optica.com', 'rol' => 'Administrador'],
            ['id' => 2, 'nombre' => 'Vendedor 1', 'email' => 'vendedor1@optica.com', 'rol' => 'Vendedor'],
        ];

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    public function show(string $id)
    {
        $usuario = ['id' => $id, 'nombre' => 'Admin Principal', 'email' => 'admin@optica.com', 'rol' => 'Administrador'];

        return view('usuarios.show', compact('usuario'));
    }

    public function edit(string $id)
    {
        $usuario = ['id' => $id, 'nombre' => 'Admin Principal', 'email' => 'admin@optica.com', 'rol' => 'Administrador'];

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(string $id)
    {
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}