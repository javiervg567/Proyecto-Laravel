@extends('layouts.app')

@section('content')
    <h2>Gestión de Personal</h2>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">Dar de Alta Empleado</a>

    <table style="margin-top: 20px;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Sueldo</th>
                <th>Fecha Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td><strong>{{ $empleado->nombre }}</strong></td>
                <td>{{ $empleado->puesto }}</td>
                <td>{{ number_format($empleado->sueldo, 2) }}€</td>
                <td>{{ $empleado->fecha_ingreso }}</td>
                <td>
                    <a href="{{ route('empleados.edit', $empleado->id) }}" style="color: var(--primary); text-decoration: none; margin-right: 10px;">Editar</a>
                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Seguro que desea eliminar este empleado?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection