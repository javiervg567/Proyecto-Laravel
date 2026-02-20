@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: 0 auto;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <div style="display: flex; align-items: center; margin-bottom: 30px; gap: 15px;">
            <div style="background: #2f9440; padding: 10px; border-radius: 12px;">
                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">Nuevo Cliente</h2>
                <p style="color: #64748b; margin: 0; font-size: 0.9rem;">Registra una nueva entidad en el sistema</p>
            </div>
        </div>

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control-custom" placeholder="Ej: Juan Pérez" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Email</label>
                    <input type="email" name="email" class="form-control-custom" placeholder="juan@empresa.com">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Teléfono</label>
                    <input type="text" name="telefono" class="form-control-custom" placeholder="600 000 000">
                </div>
            </div>

            <div style="margin-top: 30px; display: flex; gap: 15px;">
                <button type="submit" class="btn-primary" style="flex: 2; margin-bottom: 0;">Guardar Cliente</button>
                <a href="{{ route('clientes.index') }}" class="btn-secondary" style="flex: 1; text-align: center; padding: 12px; border-radius: 8px; text-decoration: none; background: #f1f5f9; color: #475569; font-weight: 600;">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<style>
    .form-control-custom {
        width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; box-sizing: border-box;
    }
    .form-control-custom:focus {
        outline: none; border-color: #2f9440; box-shadow: 0 0 0 4px rgba(47, 148, 64, 0.1);
    }
</style>
@endsection