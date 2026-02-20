<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index() {
        $proveedores = Proveedor::paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create() {
        return view('proveedores.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:proveedores,email',
            'telefono' => 'nullable|string',
            'empresa' => 'nullable|string',
        ]);

        Proveedor::create($data);
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado con éxito.');
    }

    public function edit($id) {
        $proveedore = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedore'));
    }

    public function update(Request $request, $id) {
        $proveedore = Proveedor::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:proveedores,email,' . $id,
            'telefono' => 'nullable|string',
            'empresa' => 'nullable|string',
        ]);

        $proveedore->update($data);
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id) {
        // Control de seguridad por rol
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('proveedores.index')->with('error', 'Acceso denegado.');
        }

        $proveedore = Proveedor::findOrFail($id);
        $proveedore->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado.');
    }
}