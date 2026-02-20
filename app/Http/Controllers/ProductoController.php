<?php

namespace App\Http\Controllers;

use App\Models\Producto; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'archivo_pdf' => 'nullable|mimes:pdf|max:5120', 
        ]);

        $data = $request->all();
        $archivos = $this->gestionarArchivos($request);
        
        Producto::create(array_merge($data, $archivos));

        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    // Mostrar el formulario para editar
    public function edit($id)
    {
        
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    // Actualizar los datos en la base de datos
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'archivo_pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        $data = $request->all();
        $archivos = $this->gestionarArchivos($request, $producto);

        $producto->update(array_merge($data, $archivos));

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    // Eliminar con protección de rol y limpieza de archivos
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('productos.index')->with('error', 'Acceso denegado: Solo los administradores pueden borrar.');
        }

        $producto = Producto::findOrFail($id);
        
        // Eliminación física de archivos del servidor
        if($producto->imagen) Storage::disk('public')->delete($producto->imagen);
        if($producto->archivo_pdf) Storage::disk('public')->delete($producto->archivo_pdf);

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }

    // Centralización de lógica de archivos (Sustituye archivos viejos si existen)
    private function gestionarArchivos(Request $request, $producto = null)
    {
        $paths = [];

        if ($request->hasFile('imagen')) {
            if ($producto && $producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $paths['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        if ($request->hasFile('archivo_pdf')) {
            if ($producto && $producto->archivo_pdf) {
                Storage::disk('public')->delete($producto->archivo_pdf);
            }
            $paths['archivo_pdf'] = $request->file('archivo_pdf')->store('manuales', 'public');
        }

        return $paths;
    }
}