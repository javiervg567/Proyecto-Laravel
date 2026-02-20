<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create() {
        return view('clientes.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
        ]);

        Cliente::create($data);
        return redirect()->route('clientes.index')->with('success', 'Cliente creado!');
    }

    public function edit($id) {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id) {
        $cliente = Cliente::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $id,
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
        ]);

        $cliente->update($data);
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Validación de rol administrativo
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clientes.index')->with('error', 'Acceso denegado: Solo administradores.');
        }

        $cliente = Cliente::findOrFail($id);

        // Verificación de integridad: Evita borrar clientes con pedidos asociados
        if ($cliente->pedidos()->count() > 0) {
            return redirect()->route('clientes.index')
                             ->with('error', 'No se puede eliminar, este cliente tiene pedidos en el historial.');
        }

        $cliente->delete();
        return redirect()->route('clientes.index')
                        ->with('success', 'Cliente eliminado correctamente.');
    }
}