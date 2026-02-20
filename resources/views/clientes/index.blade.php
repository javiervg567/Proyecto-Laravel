@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="font-size: 1.8rem; color: #1e293b; margin: 0; font-weight: 700;">Directorio de Clientes</h2>
            <p style="color: #64748b; margin: 5px 0 0 0;">Gestión y control de la cartera de clientes</p>
        </div>
        
        <a href="{{ route('clientes.create') }}" class="btn-primary">
            Añadir nuevo cliente
        </a>
    </div>

    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <table id="tabla-clientes" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Nombre</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Email</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Teléfono</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;" onmouseover="this.style.background='#fbfcfd'" onmouseout="this.style.background='transparent'">
                        <td style="padding: 16px 20px; font-weight: 600; color: #1e293b;">
                            {{ $cliente->nombre }}
                        </td>
                        <td style="padding: 16px 20px; color: #64748b;">
                            {{ $cliente->email }}
                        </td>
                        <td style="padding: 16px 20px; color: #64748b;">
                            {{ $cliente->telefono }}
                        </td>
                        <td style="padding: 16px 20px; text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn-action btn-edit">
                                    Editar
                                </a>

                                @if(auth()->user()->role === 'admin')
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('¿Seguro que desea eliminar este cliente?')">
                                            Eliminar
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding: 40px; text-align: center; color: #94a3b8;">
                            No se han encontrado clientes registrados en el sistema.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    <div class="pagination-wrapper">
    <div class="pagination-wrapper">
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