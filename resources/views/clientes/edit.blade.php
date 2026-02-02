@extends('layouts.app')

@section('content')
    <h2>Editar Ficha de Cliente</h2>

    <div class="card-form">
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nombre Completo</label>
            <input type="text" name="nombre" value="{{ $cliente->nombre }}" required>

            <label>Correo Electrónico</label>
            <input type="email" name="email" value="{{ $cliente->email }}" required>

            <label>Teléfono de Contacto</label>
            <input type="text" name="telefono" value="{{ $cliente->telefono }}">

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                <a href="{{ route('clientes.index') }}" style="margin-left: 15px; color: #64748b; text-decoration: none;">Volver</a>
            </div>
        </form>
    </div>
@endsection