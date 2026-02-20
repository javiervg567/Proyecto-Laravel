@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: 0 auto;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin-bottom: 25px;">Editar Proveedor</h2>
        <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
            @csrf @method('PUT')
            <div style="display: grid; gap: 20px;">
                <div>
                    <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Empresa</label>
                    <input type="text" name="nombre" value="{{ $proveedor->nombre }}" class="form-control-custom" required>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">CIF</label>
                        <input type="text" name="cif" value="{{ $proveedor->cif }}" class="form-control-custom">
                    </div>
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Teléfono</label>
                        <input type="text" name="telefono" value="{{ $proveedor->telefono }}" class="form-control-custom">
                    </div>
                </div>
            </div>
            <div style="margin-top: 30px; display: flex; gap: 15px;">
                <button type="submit" class="btn-primary-custom" style="background: #f59e0b; flex: 2;">Guardar Cambios</button>
                <a href="{{ route('proveedores.index') }}" class="btn-secondary-custom" style="flex: 1;">Volver</a>
            </div>
        </form>
    </div>
</div>
@endsection