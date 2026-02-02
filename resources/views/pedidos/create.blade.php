<h1>Nuevo Pedido</h1>

@if(session('error'))
    <div style="color: white; background: red; padding: 10px; margin-bottom: 20px;">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('pedidos.store') }}" method="POST">
    @csrf

    <label>Seleccionar Cliente:</label><br>
    <select name="cliente_id" required>
        <option value="">-- Seleccione un cliente --</option>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
        @endforeach
    </select><br><br>

    <label>Seleccionar Producto:</label><br>
<select name="producto_id" required>
    <option value="">-- Seleccione un producto --</option>
    @foreach($productos as $producto)
        <option value="{{ $producto->id }}">
            {{ $producto->nombre }} (Precio: {{ $producto->precio }}€ | Disponibles: {{ $producto->stock }})
        </option>
    @endforeach
</select><br><br>

    <label>Cantidad:</label><br>
    <input type="number" name="cantidad" min="1" value="1" required><br><br>

    <label>Fecha del Pedido:</label><br>
    <input type="date" name="fecha_pedido" value="{{ date('Y-m-d') }}" required><br><br>

    <button type="submit">Finalizar Pedido</button>
    <a href="{{ route('pedidos.index') }}">Volver</a>
</form>