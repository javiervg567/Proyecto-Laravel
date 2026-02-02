<h1>Listado de Pedidos</h1>
<a href="{{ route('pedidos.create') }}">Registrar Nuevo Pedido</a>

<table border="1" style="margin-top: 20px; width: 100%;">
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
            <td>{{ $pedido->id }}</td>
            <td>{{ $pedido->cliente->nombre }}</td> <td>{{ $pedido->producto->nombre }}</td> <td>{{ $pedido->cantidad }}</td>
            <td>{{ $pedido->total }}€</td>
            <td>{{ $pedido->fecha_pedido }}</td>
            <td>
                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Anular pedido?')">Anular</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>