<h1>Editar Ficha de Empleado</h1>

<form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre Completo:</label><br>
    <input type="text" name="nombre" value="{{ $empleado->nombre }}" required><br><br>

    <label>Puesto / Cargo:</label><br>
    <input type="text" name="puesto" value="{{ $empleado->puesto }}" required><br><br>

    <label>Sueldo Bruto:</label><br>
    <input type="number" step="0.01" name="sueldo" value="{{ $empleado->sueldo }}" required><br><br>

    <label>Fecha de Ingreso:</label><br>
    <input type="date" name="fecha_ingreso" value="{{ $empleado->fecha_ingreso }}" required><br><br>

    <button type="submit">Actualizar Datos</button>
    <a href="{{ route('empleados.index') }}">Cancelar</a>
</form>