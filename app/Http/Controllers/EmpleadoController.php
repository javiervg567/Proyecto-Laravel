<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index() {
        $empleados = Empleado::paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    public function create() {
        return view('empleados.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email',
            'puesto' => 'required|string|max:255',
            'telefono' => 'nullable|string',
        ]);

        Empleado::create($data);
        return redirect()->route('empleados.index')->with('success', 'Empleado creado con éxito.');
    }

    public function edit($id) {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id) {
        $empleado = Empleado::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email,' . $id,
            'puesto' => 'required|string|max:255',
            'telefono' => 'nullable|string',
        ]);

        $empleado->update($data);
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy($id) {
        // Control de seguridad por rol admin
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('empleados.index')->with('error', 'Acceso denegado.');
        }

        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado.');
    }
}