@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="font-size: 1.8rem; color: #1e293b; margin: 0; font-weight: 700;">Historial de Pedidos</h2>
            <p style="color: #64748b; margin: 5px 0 0 0;">Seguimiento de ventas y transacciones comerciales</p>
        </div>
        
        <a href="{{ route('pedidos.create') }}" class="btn-primary">
            Registrar Nuevo Pedido
        </a>
    </div>

    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <table id="tabla-pedidos" class="table" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">ID</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Cliente</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Producto</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Cant.</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Total</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Fecha</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pedidos as $pedido)
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;" onmouseover="this.style.background='#fbfcfd'" onmouseout="this.style.background='transparent'">
                        <td style="padding: 16px 20px; color: #64748b; font-family: monospace;">
                            #{{ $pedido->id }}
                        </td>
                        <td style="padding: 16px 20px; font-weight: 600; color: #1e293b;">
                            {{ $pedido->cliente->nombre ?? 'N/A' }}
                        </td>
                        <td style="padding: 16px 20px; color: #64748b;">
                            {{ $pedido->producto->nombre ?? 'N/A' }}
                        </td>
                        <td style="padding: 16px 20px; color: #64748b;">
                            {{ $pedido->cantidad }}
                        </td>
                        <td style="padding: 16px 20px; color: #1e293b; font-weight: 700;">
                            {{ number_format($pedido->total, 2) }}€
                        </td>
                        <td style="padding: 16px 20px; color: #64748b;">
                            {{ $pedido->fecha_pedido }}
                        </td>
                        <td style="padding: 16px 20px; text-align: center;">
                            @if(auth()->user()->role === 'admin')
                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: #fee2e2; color: #991b1b; border: none; padding: 6px 12px; border-radius: 6px; font-size: 0.8rem; font-weight: 600; cursor: pointer;" onclick="return confirm('¿Seguro que desea anular este pedido?')">
                                        Eliminar
                                    </button>
                                </form>
                            @else
                                <span style="color: #94a3b8; font-size: 0.8rem; font-style: italic;">Solo lectura</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
    <div class="pagination-wrapper">
    {{-- Buscamos cualquier variable que venga paginada (pedidos, clientes, productos...) --}}
    @php $itemPaginado = $pedidos ?? $productos ?? $clientes ?? $proveedores ?? $empleados ?? null; @endphp

    @if ($itemPaginado && $itemPaginado->hasPages())
        {{ $itemPaginado->links() }}
    @else
        <nav>
            <ul class="pagination">
                <li class="disabled"><span class="page-link">« Anterior</span></li>
                <li class="active"><span class="page-link">1</span></li>
                <li class="disabled"><span class="page-link">Siguiente »</span></li>
            </ul>
        </nav>
    @endif
</div>
@endsection