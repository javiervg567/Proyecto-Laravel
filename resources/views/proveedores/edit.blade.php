@extends('layouts.app')

@section('content')
    <h2>Editar Proveedor</h2>

    <div class="card-form">
        <form action="{{ route('proveedores.update', $proveedore->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nombre de la Empresa</label>
            <input type="text" name="nombre_empresa" value="{{ $proveedore->nombre_empresa }}" required>

            <label>Correo Electrónico</label>
            <input type="email" name="email" value="{{ $proveedore->email }}" required>

            <label>Teléfono de Contacto</label>
            <input type="text" name="telefono" value="{{ $proveedore->telefono }}">

            <label>Categoría de Suministro</label>
            <input type="text" name="categoria" value="{{ $proveedore->categoria }}">

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
                <a href="{{ route('proveedores.index') }}" style="margin-left: 15px; color: #64748b; text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection