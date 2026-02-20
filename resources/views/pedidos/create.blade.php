@extends('layouts.app')

@section('content')
<div style="max-width: 750px; margin: 0 auto;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
            <div style="background: #8b5cf6; padding: 10px; border-radius: 12px;">
                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">Generar Nuevo Pedido</h2>
                <p style="color: #64748b; margin: 0; font-size: 0.9rem;">Registra una venta y actualiza el stock</p>
            </div>
        </div>

        <form action="{{ route('pedidos.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="grid-column: span 2;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Cliente</label>
                    <select name="cliente_id" class="form-control-custom" required>
                        <option value="">Selecciona un cliente...</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Producto</label>
                    <select name="producto_id" class="form-control-custom" required>
                        <option value="">¿Qué producto lleva?</option>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }} ({{ $producto->precio }}€)</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control-custom" min="1" value="1" required>
                </div>
            </div>

            <div style="margin-top: 35px; display: flex; gap: 15px;">
                <button type="submit" class="btn-primary-custom" style="background: #8b5cf6; flex: 2;">Confirmar Pedido</button>
                <a href="{{ route('pedidos.index') }}" class="btn-secondary-custom" style="flex: 1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection