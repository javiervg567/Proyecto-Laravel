@extends('layouts.app')

@section('content')
    <h2>Añadir Nuevo Producto</h2>

    <div class="card-form">
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <label>Nombre del Producto</label>
            <input type="text" name="nombre" placeholder="Nombre del artículo" required>

            <label>Precio (€)</label>
            <input type="number" step="0.01" name="precio" placeholder="0.00" required>

            <label>Stock Inicial</label>
            <input type="number" name="stock" placeholder="Cantidad disponible" required>

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
                <a href="{{ route('productos.index') }}" style="margin-left: 15px; color: #64748b; text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection