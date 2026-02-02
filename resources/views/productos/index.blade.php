@extends('layouts.app')

@section('content')
    <h2>Inventario de Productos</h2>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo Producto</a>

    <table style="margin-top: 20px;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock Disponible</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ number_format($producto->precio, 2) }}€</td>
                <td>
                    <span style="padding: 4px 8px; border-radius: 4px; {{ $producto->stock < 5 ? 'background: #fee2e2; color: #b91c1c;' : 'background: #dcfce7; color: #166534;' }}">
                        {{ $producto->stock }} unidades
                    </span>
                </td>
                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}" style="color: var(--primary); text-decoration: none; margin-right: 10px;">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Seguro que desea eliminar este producto?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection