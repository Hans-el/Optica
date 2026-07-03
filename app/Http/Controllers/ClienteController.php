<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        // TODO: reemplazar por Cliente::all()
        $clientes = [
            ['id' => 1, 'nombre' => 'María', 'apellido' => 'Gómez', 'cedula' => '0912345678', 'telefono' => '0991234567', 'email' => 'maria.gomez@mail.com'],
            ['id' => 2, 'nombre' => 'Carlos', 'apellido' => 'Pérez', 'cedula' => '0923456789', 'telefono' => '0987654321', 'email' => 'carlos.perez@mail.com'],
        ];

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }

    public function show(string $id)
    {
        $cliente = ['id' => $id, 'nombre' => 'María', 'apellido' => 'Gómez', 'cedula' => '0912345678', 'telefono' => '0991234567', 'email' => 'maria.gomez@mail.com'];

        return view('clientes.show', compact('cliente'));
    }

    public function edit(string $id)
    {
        $cliente = ['id' => $id, 'nombre' => 'María', 'apellido' => 'Gómez', 'cedula' => '0912345678', 'telefono' => '0991234567', 'email' => 'maria.gomez@mail.com'];

        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy(string $id)
    {
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
    }
}