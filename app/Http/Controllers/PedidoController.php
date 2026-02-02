<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index() {
        // 'with' carga los datos del cliente y el producto para no hacer 1000 consultas
        $pedidos = Pedido::with(['cliente', 'producto'])->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create() {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('pedidos.create', compact('clientes', 'productos'));
    }

    public function store(Request $request) {
    $producto = Producto::find($request->producto_id);

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

    $producto->stock = $producto->stock - $request->cantidad;
    $producto->save();

    return redirect()->route('pedidos.index')->with('success', 'Pedido realizado y stock actualizado.');
}

    public function destroy(Pedido $pedido) {
        $pedido->delete();
        return redirect()->route('pedidos.index');
    }
}