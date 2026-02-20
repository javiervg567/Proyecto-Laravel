@extends('layouts.app')

@section('content')
<div style="max-width: 750px; margin: 0 auto;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
            <div style="background: #10b981; padding: 10px; border-radius: 12px;">
                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            <div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">Editar Producto</h2>
                <p style="color: #64748b; margin: 0; font-size: 0.9rem;">Actualizando: {{ $producto->nombre }}</p>
            </div>
        </div>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="grid-column: span 2;">
                    <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Nombre</label>
                    <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control-custom" required>
                </div>
                <div>
                    <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Nueva Imagen (Opcional)</label>
                    <input type="file" name="imagen" class="form-control-custom">
                </div>
                <div>
                    <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Nuevo PDF (Opcional)</label>
                    <input type="file" name="pdf" class="form-control-custom">
                </div>
                <div>
                    <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Precio (€)</label>
                    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="form-control-custom" required>
                </div>
                <div>
                    <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Stock Actual</label>
                    <input type="number" name="stock" value="{{ $producto->stock }}" class="form-control-custom" required>
                </div>
            </div>
            <div style="margin-top: 35px; display: flex; gap: 15px;">
                <button type="submit" class="btn-primary-custom" style="background: #10b981; flex: 2;">Actualizar Cambios</button>
                <a href="{{ route('productos.index') }}" class="btn-secondary-custom" style="flex: 1;">Volver</a>
            </div>
        </form>
    </div>
</div>
@endsection