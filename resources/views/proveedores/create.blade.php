@extends('layouts.app')

@section('content')
    <h2>Registrar Nuevo Proveedor</h2>

    <div class="card-form">
        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf
            <label>Nombre de la Empresa</label>
            <input type="text" name="nombre_empresa" placeholder="Razón social" required>

            <label>Correo Electrónico</label>
            <input type="email" name="email" placeholder="contacto@proveedor.com" required>

            <label>Teléfono</label>
            <input type="text" name="telefono" placeholder="Número de contacto">

            <label>Categoría</label>
            <input type="text" name="categoria" placeholder="Ej: Electrónica, Alimentación...">

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Guardar Proveedor</button>
                <a href="{{ route('proveedores.index') }}" style="margin-left: 15px; color: #64748b; text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection