<?php

namespace App\Http\Controllers;

use App\Models\Producto; 
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Listar todos los productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Mostrar formulario para crear un nuevo producto
    public function create()
    {
        return view('productos.create');
    }

  // Almacenar un nuevo producto
    public function store(Request $request)
    {
        
        Producto::create($request->all());
        
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    // Mostrar un solo producto (detalle)
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    // Mostrar el formulario para editar
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar los datos en la base de datos
    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    // Eliminar el producto
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}