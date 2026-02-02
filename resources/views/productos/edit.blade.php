<h1>Editar Producto</h1>

<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT') 

    <label>Nombre del Producto:</label><br>
    <input type="text" name="nombre" value="{{ $producto->nombre }}" required><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" value="{{ $producto->stock }}" required><br><br>

    <button type="submit">Actualizar Producto</button>
    <a href="{{ route('productos.index') }}">Cancelar</a>
</form>