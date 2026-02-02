@extends('layouts.app')

@section('content')
    <h2>Registrar Nuevo Pedido</h2>

    @if(session('error'))
        <div style="background: #fee2e2; color: #b91c1c; padding: 15px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('error') }}
        </div>
    @endif

    <div class="card-form">
        <form action="{{ route('pedidos.store') }}" method="POST">
            @csrf
            <label>Cliente</label>
            <select name="cliente_id" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>

            <label>Producto</label>
            <select name="producto_id" required>
                <option value="">Seleccione un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">
                        {{ $producto->nombre }} ({{ $producto->precio }}€ | Stock: {{ $producto->stock }})
                    </option>
                @endforeach
            </select>

            <label>Cantidad</label>
            <input type="number" name="cantidad" min="1" value="1" required>

            <label>Fecha</label>
            <input type="date" name="fecha_pedido" value="{{ date('Y-m-d') }}" required>

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Finalizar Pedido</button>
                <a href="{{ route('pedidos.index') }}" style="margin-left: 15px; color: #64748b; text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection