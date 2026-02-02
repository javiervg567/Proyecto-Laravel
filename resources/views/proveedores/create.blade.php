<h1>Registrar Proveedor</h1>

<form action="{{ route('proveedores.store') }}" method="POST">
    @csrf
    <label>Nombre de la Empresa:</label><br>
    <input type="text" name="nombre_empresa" required><br><br>

    <label>Email de contacto:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono" required><br><br>

    <label>Categoría (Sector):</label><br>
    <input type="text" name="categoria" placeholder="Ej: Logística, Software..."><br><br>

    <button type="submit">Guardar Proveedor</button>
    <a href="{{ route('proveedores.index') }}">Cancelar</a>
</form>