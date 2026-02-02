@extends('layouts.app')

@section('content')
    <h2>Editar Empleado</h2>

    <div class="card-form">
        <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nombre Completo</label>
            <input type="text" name="nombre" value="{{ $empleado->nombre }}" required>

            <label>Puesto</label>
            <input type="text" name="puesto" value="{{ $empleado->puesto }}" required>

            <label>Sueldo</label>
            <input type="number" step="0.01" name="sueldo" value="{{ $empleado->sueldo }}" required>

            <label>Fecha de Ingreso</label>
            <input type="date" name="fecha_ingreso" value="{{ $empleado->fecha_ingreso }}" required>

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                <a href="{{ route('empleados.index') }}" style="margin-left: 15px; color: #64748b; text-decoration: none;">Volver al listado</a>
            </div>
        </form>
    </div>
@endsection