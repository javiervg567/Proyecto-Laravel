<h1>Editar Proveedor</h1>

<form action="{{ route('proveedores.update', $proveedore->id) }}" method="POST">
    @csrf
    @method('PUT') <label>Nombre de la Empresa:</label><br>
    <input type="text" name="nombre_empresa" value="{{ $proveedore->nombre_empresa }}" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ $proveedore->email }}" required><br><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono" value="{{ $proveedore->telefono }}" required><br><br>

    <label>Categoría:</label><br>
    <input type="text" name="categoria" value="{{ $proveedore->categoria }}"><br><br>

    <button type="submit">Actualizar Proveedor</button>
    <a href="{{ route('proveedores.index') }}">Cancelar</a>
</form>