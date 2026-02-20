@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: 0 auto;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin-bottom: 25px;">Modificar Pedido</h2>
        <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
            @csrf @method('PUT')
            <div style="display: grid; gap: 20px;">
                <div>
                    <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Cliente</label>
                    <select name="cliente_id" class="form-control-custom" required>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $pedido->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Producto</label>
                        <select name="producto_id" class="form-control-custom" required>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}" {{ $pedido->producto_id == $producto->id ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 600; color: #475569; display: block; margin-bottom: 8px;">Cantidad</label>
                        <input type="number" name="cantidad" value="{{ $pedido->cantidad }}" class="form-control-custom" required>
                    </div>
                </div>
            </div>
            <div style="margin-top: 30px; display: flex; gap: 15px;">
                <button type="submit" class="btn-primary-custom" style="background: #8b5cf6; flex: 2;">Actualizar Pedido</button>
                <a href="{{ route('pedidos.index') }}" class="btn-secondary-custom" style="flex: 1;">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection