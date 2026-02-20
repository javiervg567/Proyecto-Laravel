<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalClientes = \App\Models\Cliente::count();
        $totalProductos = \App\Models\Producto::count();
        $totalPedidos = \App\Models\Pedido::count();
        $totalEmpleados = \App\Models\Empleado::count();

       return view('home', compact('totalClientes', 'totalProductos', 'totalPedidos', 'totalEmpleados'));
    }
}
