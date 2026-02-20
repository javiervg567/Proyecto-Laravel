@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: 0 auto;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin-bottom: 25px;">Modificar Ficha de Empleado</h2>
        <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
            @csrf @method('PUT')
            <div style="display: grid; gap: 20px;">
                <div>
                    <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Nombre y Apellidos</label>
                    <input type="text" name="nombre" value="{{ $empleado->nombre }}" class="form-control-custom" required>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">DNI</label>
                        <input type="text" name="dni" value="{{ $empleado->dni }}" class="form-control-custom" required>
                    </div>
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Cargo</label>
                        <input type="text" name="cargo" value="{{ $empleado->cargo }}" class="form-control-custom">
                    </div>
                </div>
            </div>
            <div style="margin-top: 30px; display: flex; gap: 15px;">
                <button type="submit" class="btn-primary-custom" style="background: #2f9440; flex: 2;">Actualizar Empleado</button>
                <a href="{{ route('empleados.index') }}" class="btn-secondary-custom" style="flex: 1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection