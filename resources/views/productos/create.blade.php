@extends('layouts.app')

@section('content')
<div style="max-width: 750px; margin: 0 auto;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
            <div style="background: #10b981; padding: 10px; border-radius: 12px;">
                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                </svg>
            </div>
            <div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">Nuevo Producto con Documentación</h2>
                <p style="color: #64748b; margin: 0; font-size: 0.9rem;">Sube la foto del producto y su ficha técnica en PDF</p>
            </div>
        </div>

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Nombre del Producto</label>
                    <input type="text" name="nombre" class="form-control-custom" placeholder="Ej: Motor Hidráulico X1" required>
                </div>

                <div style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 15px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                        <svg style="width: 16px; height: 16px; color: #10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Imagen (JPG/PNG)
                    </label>
                    <input type="file" name="imagen" accept="image/*" style="font-size: 0.8rem; width: 100%;">
                </div>

                <div style="background: #fff1f2; border: 1.5px solid #fecdd3; border-radius: 12px; padding: 15px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #991b1b; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                        <svg style="width: 16px; height: 16px; color: #e11d48;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a2 2 0 00-.586-1.414l-4-4A2 2 0 0013 3.414V7a1 1 0 01-1 1H8a1 1 0 01-1-1V3.414a2 2 0 00-1.414.586l-4 4A2 2 0 001 9.414V19a2 2 0 002 2z"></path></svg>
                        Ficha Técnica (PDF)
                    </label>
                    <input type="file" name="pdf" accept="application/pdf" style="font-size: 0.8rem; width: 100%;">
                </div>

                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Precio (€)</label>
                    <input type="number" step="0.01" name="precio" class="form-control-custom" placeholder="0.00" required>
                </div>

                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Stock Inicial</label>
                    <input type="number" name="stock" class="form-control-custom" placeholder="Unidades" required>
                </div>
            </div>

            <div style="margin-top: 35px; display: flex; gap: 15px;">
                <button type="submit" style="flex: 2; background: #10b981; color: white; padding: 14px; border: none; border-radius: 10px; font-weight: 700; cursor: pointer; transition: 0.3s;">Guardar Producto</button>
                <a href="{{ route('productos.index') }}" style="flex: 1; background: #f1f5f9; color: #475569; padding: 14px; border-radius: 10px; text-decoration: none; font-weight: 600; text-align: center;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection