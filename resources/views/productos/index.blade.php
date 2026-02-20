@extends('layouts.app')

@section('content')
    <h2>Inventario de Productos</h2>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo Producto</a>

    <table id="tabla-productos" style="margin-top: 20px; width: 100%;">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock Disponible</th>
                <th>Manual</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>
                    @if($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Foto" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                    @else
                        <span style="color: #ccc; font-size: 0.8rem;">Sin foto</span>
                    @endif
                </td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ number_format($producto->precio, 2) }}€</td>
                <td>
                    <span style="padding: 4px 8px; border-radius: 4px; {{ $producto->stock < 5 ? 'background: #fee2e2; color: #b91c1c;' : 'background: #dcfce7; color: #166534;' }}">
                        {{ $producto->stock }} unidades
                    </span>
                </td>
                <td>
                    @if($producto->archivo_pdf)
                        <a href="{{ asset('storage/' . $producto->archivo_pdf) }}" target="_blank" style="text-decoration: none; font-size: 1.2rem;" title="Ver PDF">📄</a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    {{-- Todo usuario puede editar --}}
                    <a href="{{ route('productos.edit', $producto->id) }}" style="color: var(--primary); text-decoration: none; margin-right: 10px;">Editar</a>

                    {{-- Control de permisos: Solo el Admin puede borrar --}}
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('¿Seguro que desea eliminar este producto?')">
                                Eliminar
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection