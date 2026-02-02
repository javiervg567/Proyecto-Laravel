@extends('layouts.app')

@section('content')
    <h2>Alta de Nuevo Empleado</h2>

    <div class="card-form">
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf
            <label>Nombre Completo</label>
            <input type="text" name="nombre" placeholder="Nombre y apellidos" required>

            <label>Puesto o Cargo</label>
            <input type="text" name="puesto" placeholder="Ej: Gerente, Vendedor..." required>

            <label>Sueldo Bruto Mensual</label>
            <input type="number" step="0.01" name="sueldo" placeholder="0.00" required>

            <label>Fecha de Contratación</label>
            <input type="date" name="fecha_ingreso" value="{{ date('Y-m-d') }}" required>

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Registrar Empleado</button>
                <a href="{{ route('empleados.index') }}" style="margin-left: 15px; color: #64748b; text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection