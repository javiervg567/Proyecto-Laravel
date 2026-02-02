@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="font-size: 1.8rem; color: #1e293b; margin: 0; font-weight: 700;">Directorio de Proveedores</h2>
            <p style="color: #64748b; margin: 5px 0 0 0;">Gestión y control de entidades suministradoras</p>
        </div>
        
        <a href="{{ route('proveedores.create') }}" class="btn-primary">
            Añadir nuevo proveedor
        </a>
    </div>

    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Empresa</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Email</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Teléfono</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Categoría</th>
                    <th style="padding: 16px 20px; color: #475569; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($proveedores as $proveedor)
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;" onmouseover="this.style.background='#fbfcfd'" onmouseout="this.style.background='transparent'">
                        <td style="padding: 16px 20px; font-weight: 600; color: #1e293b;">
                            {{ $proveedor->nombre }}
                        </td>
                        <td style="padding: 16px 20px; color: #64748b;">
                            {{ $proveedor->email }}
                        </td>
                        <td style="padding: 16px 20px; color: #64748b;">
                            {{ $proveedor->telefono }}
                        </td>
                        <td style="padding: 16px 20px;">
                            <span style="background: #f1f5f9; color: #475569; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 500;">
                                {{ $proveedor->categoria }}
                            </span>
                        </td>
                        <td style="padding: 16px 20px; text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn-action btn-edit">
                                    Editar
                                </a>

                                <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('¿Seguro que desea eliminar este proveedor?')">
                                    Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 40px; text-align: center; color: #94a3b8;">
                            No se han encontrado proveedores registrados en el sistema.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $proveedores->links() }}
    </div>
@endsection