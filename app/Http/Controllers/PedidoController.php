<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index() {
        $pedidos = Pedido::with(['cliente', 'producto'])->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create() {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('pedidos.create', compact('clientes', 'productos'));
    }

    public function store(Request $request) {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'fecha_pedido' => 'required|date',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        // Validación de stock
        if ($request->cantidad > $producto->stock) {
            return back()->with('error', 'No hay suficiente stock. Solo quedan ' . $producto->stock . ' unidades.');
        }

        $total = $producto->precio * $request->cantidad;

        Pedido::create([
            'cliente_id' => $request->cliente_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'total' => $total,
            'fecha_pedido' => $request->fecha_pedido,
        ]);

        // Descontar stock
        $producto->decrement('stock', $request->cantidad);

        return redirect()->route('pedidos.index')->with('success', 'Pedido realizado y stock actualizado.');
    }

    public function edit($id) {
        // Añadido: Método edit para poder modificar pedidos existentes
        $pedido = Pedido::findOrFail($id);
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('pedidos.edit', compact('pedido', 'clientes', 'productos'));
    }

    public function update(Request $request, $id) {
        $pedido = Pedido::findOrFail($id);
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_pedido' => 'required|date',
        ]);

        $pedido->update($request->only(['cliente_id', 'fecha_pedido']));

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy($id) {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('pedidos.index')->with('error', 'Acceso denegado.');
        }

        $pedido = Pedido::findOrFail($id);
        
        // Corregido: Devolver el stock al producto antes de borrar el pedido
        $producto = Producto::find($pedido->producto_id);
        if ($producto) {
            $producto->increment('stock', $pedido->cantidad);
        }

        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado y stock devuelto al inventario.');
    }
}