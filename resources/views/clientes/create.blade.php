<h1>Nuevo Cliente</h1>
<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="telefono" placeholder="Teléfono"><br>
    <textarea name="direccion" placeholder="Dirección"></textarea><br>
    <button type="submit">Guardar</button>
</form>