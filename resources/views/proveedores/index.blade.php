<h1>Gestión de Proveedores</h1>
<a href="{{ route('proveedores.create') }}">Añadir Nuevo Proveedor</a>

<table border="1" style="margin-top: 20px; width: 100%; text-align: left;">
    <thead>
        <tr>
            <th>Empresa</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proveedores as $proveedor)
        <tr>
            <td>{{ $proveedor->nombre_empresa }}</td>
            <td>{{ $proveedor->email }}</td>
            <td>{{ $proveedor->telefono }}</td>
            <td>{{ $proveedor->categoria }}</td>
            <td>
                <a href="{{ route('proveedores.edit', $proveedor->id) }}">Editar</a>
                
                <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar este proveedor?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>