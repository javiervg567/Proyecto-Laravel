<h1>Añadir Producto</h1>

<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <label>Nombre del Producto:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" required><br><br>

    <label>Stock Inicial:</label><br>
    <input type="number" name="stock" required><br><br>

    <button type="submit">Guardar Producto</button>
    <a href="{{ route('productos.index') }}">Volver</a>
</form>