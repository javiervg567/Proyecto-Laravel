@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="margin: 0; color: #1e293b; font-weight: 800;">Inventario de Productos</h2>
        <a href="{{ route('productos.create') }}" 
           style="background: #10b981; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 700; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2); transition: all 0.3s;">
           + Nuevo Producto
        </a>
    </div>

    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                    <th style="padding: 15px 20px; color: #64748b; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em;">Imagen</th>
                    <th style="padding: 15px 20px; color: #64748b; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em;">Nombre</th>
                    <th style="padding: 15px 20px; color: #64748b; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em;">Precio</th>
                    <th style="padding: 15px 20px; color: #64748b; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em;">Stock</th>
                    <th style="padding: 15px 20px; color: #64748b; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em;">Manual</th>
                    <th style="padding: 15px 20px; color: #64748b; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em; text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='white'">
                    <td style="padding: 12px 20px;">
                        @if($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Foto" style="width: 45px; height: 45px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;">
                        @else
                            <div style="width: 45px; height: 45px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 0.7rem;">N/A</div>
                        @endif
                    </td>
                    <td style="padding: 12px 20px; font-weight: 600; color: #334155;">{{ $producto->nombre }}</td>
                    <td style="padding: 12px 20px; color: #64748b;">{{ number_format($producto->precio, 2) }}€</td>
                    <td style="padding: 12px 20px;">
                        <span style="padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; {{ $producto->stock < 5 ? 'background: #fff1f2; color: #be123c;' : 'background: #f0fdf4; color: #15803d;' }}">
                            {{ $producto->stock }} uds
                        </span>
                    </td>
                    <td style="padding: 12px 20px;">
                        @if($producto->archivo_pdf)
                            <a href="{{ asset('storage/' . $producto->archivo_pdf) }}" target="_blank" style="text-decoration: none; background: #f1f5f9; padding: 5px 10px; border-radius: 6px; color: #475569; font-size: 0.9rem;" title="Ver PDF">
                                📄 <span style="font-size: 0.75rem; font-weight: 600;">PDF</span>
                            </a>
                        @else
                            <span style="color: #cbd5e1;">-</span>
                        @endif
                    </td>
                    <td style="padding: 12px 20px; text-align: right;">
                        <div style="display: flex; gap: 8px; justify-content: flex-end;">
                            {{-- Botón Editar --}}
                            <a href="{{ route('productos.edit', $producto->id) }}" 
                               style="background: #eff6ff; color: #2563eb; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.75rem; font-weight: 700; border: 1px solid #dbeafe;">
                                EDITAR
                            </a>

                            {{-- Botón Eliminar (Solo Admin) --}}
                            @if(auth()->user()->role === 'admin')
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Eliminar este producto?')"
                                            style="background: #fff1f2; color: #e11d48; padding: 6px 12px; border-radius: 6px; border: 1px solid #ffe4e6; font-size: 0.75rem; font-weight: 700; cursor: pointer;">
                                        BORRAR
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Paginación Premium --}}
    <div style="margin-top: 25px; display: flex; justify-content: center;">
        <div class="custom-pagination">
            {{ $productos->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection