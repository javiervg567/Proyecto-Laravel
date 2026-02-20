@extends('layouts.app')

@section('content')
<div style="max-width: 750px; margin: 0 auto;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
            <div style="background: #f59e0b; padding: 10px; border-radius: 12px;">
                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">Nuevo Proveedor</h2>
                <p style="color: #64748b; margin: 0; font-size: 0.9rem;">Gestiona tus fuentes de suministro</p>
            </div>
        </div>

        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Nombre de la Empresa</label>
                    <input type="text" name="nombre" class="form-control-custom" placeholder="Ej: Suministros Valle S.L." required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">CIF / NIF</label>
                    <input type="text" name="cif" class="form-control-custom" placeholder="B12345678">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Teléfono de Contacto</label>
                    <input type="text" name="telefono" class="form-control-custom" placeholder="956 00 00 00">
                </div>
                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Dirección</label>
                    <input type="text" name="direccion" class="form-control-custom" placeholder="Calle, Número, Ciudad">
                </div>
            </div>

            <div style="margin-top: 35px; display: flex; gap: 15px;">
                <button type="submit" class="btn-primary-custom" style="background: #f59e0b; flex: 2;">Guardar Proveedor</button>
                <a href="{{ route('proveedores.index') }}" class="btn-secondary-custom" style="flex: 1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection