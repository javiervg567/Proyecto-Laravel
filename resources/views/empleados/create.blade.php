@extends('layouts.app')

@section('content')
<div style="max-width: 750px; margin: 0 auto;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
            <div style="background: #3b82f6; padding: 10px; border-radius: 12px;">
                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">Alta de Empleado</h2>
                <p style="color: #64748b; margin: 0; font-size: 0.9rem;">Registra un nuevo miembro en el equipo de CRMVALLE</p>
            </div>
        </div>

        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control-custom" placeholder="Nombre y apellidos" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">DNI / NIE</label>
                    <input type="text" name="dni" class="form-control-custom" placeholder="12345678X" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Puesto / Cargo</label>
                    <input type="text" name="cargo" class="form-control-custom" placeholder="Ej: Técnico de campo">
                </div>
                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Email Corporativo</label>
                    <input type="email" name="email" class="form-control-custom" placeholder="empleado@crmvalle.com">
                </div>
            </div>

            <div style="margin-top: 35px; display: flex; gap: 15px;">
                <button type="submit" class="btn-primary-custom" style="background: #3b82f6; flex: 2;">Registrar Empleado</button>
                <a href="{{ route('empleados.index') }}" class="btn-secondary-custom" style="flex: 1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection