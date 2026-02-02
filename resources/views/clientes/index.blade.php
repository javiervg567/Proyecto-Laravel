@extends('layouts.app')

@section('content')
    <h2>Gestión de Clientes</h2>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Añadir Nuevo Cliente</a>

    <table style="margin-top: 20px;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td><strong>{{ $cliente->nombre }}</strong></td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->telefono ?? 'No asignado' }}</td>
                <td>
                    <a href="{{ route('clientes.edit', $cliente->id) }}" style="color: var(--primary); text-decoration: none; margin-right: 15px;">Editar</a>
                    
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Eliminar cliente permanentemente?')">
                                    Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection