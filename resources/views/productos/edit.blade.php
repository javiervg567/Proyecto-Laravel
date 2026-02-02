@extends('layouts.app')

@section('content')
    <h2>Editar Producto</h2>

    <div class="card-form">
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nombre del Producto</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}" required>

            <label>Precio (€)</label>
            <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required>

            <label>Stock Actual</label>
            <input type="number" name="stock" value="{{ $producto->stock }}" required>

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('productos.index') }}" style="margin-left: 15px; color: #64748b; text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection