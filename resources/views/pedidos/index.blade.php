@extends('layouts.app')

@section('content')
    <h2>Historial de Pedidos</h2>
    <a href="{{ route('pedidos.create') }}" class="btn btn-primary">Registrar Nuevo Pedido</a>

    <table style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>#{{ $pedido->id }}</td>
                <td>{{ $pedido->cliente->nombre }}</td>
                <td>{{ $pedido->producto->nombre }}</td>
                <td>{{ $pedido->cantidad }}</td>
                <td><strong>{{ number_format($pedido->total, 2) }}€</strong></td>
                <td>{{ $pedido->fecha_pedido }}</td>
                <td>
                    <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Anular pedido?')">
                                    Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection