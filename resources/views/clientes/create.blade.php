@extends('layouts.app')

@section('content')
    <h2>Nuevo Cliente</h2>

    <div class="card-form">
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <label>Nombre Completo</label>
            <input type="text" name="nombre" placeholder="Ej: Juan Pérez" required>

            <label>Correo Electrónico</label>
            <input type="email" name="email" placeholder="juan@ejemplo.com" required>

            <label>Teléfono</label>
            <input type="text" name="telefono" placeholder="600000000">

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Registrar Cliente</button>
                <a href="{{ route('clientes.index') }}" style="margin-left: 15px; color: #64748b; text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection