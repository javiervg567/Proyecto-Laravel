<h1>Inventario de Productos</h1>
<a href="{{ route('productos.create') }}">Añadir Nuevo Producto</a>

<table border="1" style="margin-top: 20px; width: 100%; text-align: left;">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->precio }}€</td>
            <td>{{ $producto->stock }} unidades</td>
            <td>
                <a href="{{ route('productos.edit', $producto->id) }}">Editar</a>
                
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Seguro que quieres borrarlo?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>