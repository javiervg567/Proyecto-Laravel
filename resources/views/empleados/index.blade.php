<h1>Gestión de Empleados</h1>
<a href="{{ route('empleados.create') }}">Contratar Nuevo Empleado</a>

<table border="1" style="margin-top: 20px; width: 100%; text-align: left;">
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
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->puesto }}</td>
            <td>{{ $empleado->sueldo }}€</td>
            <td>{{ $empleado->fecha_ingreso }}</td>
            <td>
                <a href="{{ route('empleados.edit', $empleado->id) }}">Editar</a>
                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Dar de baja a este empleado?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>