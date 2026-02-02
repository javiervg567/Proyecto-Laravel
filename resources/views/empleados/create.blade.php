<h1>Nuevo Empleado</h1>

<form action="{{ route('empleados.store') }}" method="POST">
    @csrf
    <label>Nombre Completo:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Puesto / Cargo:</label><br>
    <input type="text" name="puesto" required><br><br>

    <label>Sueldo Bruto:</label><br>
    <input type="number" step="0.01" name="sueldo" required><br><br>

    <label>Fecha de Ingreso:</label><br>
    <input type="date" name="fecha_ingreso" required><br><br>

    <button type="submit">Guardar Empleado</button>
    <a href="{{ route('empleados.index') }}">Cancelar</a>
</form>