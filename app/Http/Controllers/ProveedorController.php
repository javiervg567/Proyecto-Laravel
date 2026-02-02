<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index() {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create() {
        return view('proveedores.create');
    }

    public function store(Request $request) {
        Proveedor::create($request->all());
        return redirect()->route('proveedores.index');
    }

    public function edit(Proveedor $proveedore) {
        return view('proveedores.edit', compact('proveedore'));
    }

    public function update(Request $request, Proveedor $proveedore) {
        $proveedore->update($request->all());
        return redirect()->route('proveedores.index');
    }

    public function destroy(Proveedor $proveedore) {
        $proveedore->delete();
        return redirect()->route('proveedores.index');
    }
}
