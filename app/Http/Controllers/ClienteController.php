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
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado!');
    }
    public function destroy(Cliente $cliente)
    {
        if ($cliente->pedidos()->count() > 0) {
            return redirect()->route('clientes.index')
                            ->with('error', 'No se puede eliminar, este cliente tiene pedidos en el historial.');
        }

        $cliente->delete();
        return redirect()->route('clientes.index')
                        ->with('success', 'Cliente eliminado correctamente.');
    }
}