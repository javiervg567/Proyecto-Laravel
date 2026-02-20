@extends('layouts.app')

@section('content')
<div style="margin-bottom: 40px;">
    <h2 style="font-size: 2rem; color: #1e293b; font-weight: 800; margin: 0;">Panel de Control</h2>
    <p style="color: #64748b; margin-top: 5px;">Bienvenido al sistema de gestión CRMVALLE</p>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 40px;">
    
    <div style="background: white; padding: 25px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); border-bottom: 4px solid #3b82f6;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <p style="color: #64748b; font-size: 0.9rem; font-weight: 600; text-transform: uppercase; margin: 0;">Clientes</p>
                <h3 style="font-size: 2rem; color: #1e293b; margin: 10px 0;">{{ $totalClientes }}</h3>
            </div>
            <div style="background: #eff6ff; padding: 12px; border-radius: 12px;">
                <svg style="width: 30px; height: 30px; color: #3b82f6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>
        <a href="{{ route('clientes.index') }}" style="color: #3b82f6; text-decoration: none; font-size: 0.85rem; font-weight: 600;">Ver listado →</a>
    </div>

    <div style="background: white; padding: 25px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); border-bottom: 4px solid #10b981;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <p style="color: #64748b; font-size: 0.9rem; font-weight: 600; text-transform: uppercase; margin: 0;">Productos</p>
                <h3 style="font-size: 2rem; color: #1e293b; margin: 10px 0;">{{ $totalProductos }}</h3>
            </div>
            <div style="background: #ecfdf5; padding: 12px; border-radius: 12px;">
                <svg style="width: 30px; height: 30px; color: #10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
        </div>
        <a href="{{ route('productos.index') }}" style="color: #10b981; text-decoration: none; font-size: 0.85rem; font-weight: 600;">Gestionar stock →</a>
    </div>

    <div style="background: white; padding: 25px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); border-bottom: 4px solid #f59e0b;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <p style="color: #64748b; font-size: 0.9rem; font-weight: 600; text-transform: uppercase; margin: 0;">Pedidos</p>
                <h3 style="font-size: 2rem; color: #1e293b; margin: 10px 0;">{{ $totalPedidos }}</h3>
            </div>
            <div style="background: #fffbeb; padding: 12px; border-radius: 12px;">
                <svg style="width: 30px; height: 30px; color: #f59e0b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
        </div>
        <a href="{{ route('pedidos.index') }}" style="color: #f59e0b; text-decoration: none; font-size: 0.85rem; font-weight: 600;">Revisar ventas →</a>
    </div>
</div>

<div style="background: linear-gradient(135deg, #2f9440 0%, #10b981 100%); padding: 40px; border-radius: 20px; color: white; margin-bottom: 40px;">
    <div style="max-width: 600px;">
        <h2 style="font-size: 1.8rem; margin: 0 0 15px 0;">¡Hola, {{ Auth::user()->name }}!</h2>
        <p style="font-size: 1.1rem; opacity: 0.9; line-height: 1.6;">
            Tienes el control total de la empresa desde este panel. Puedes dar de alta empleados, gestionar pedidos en tiempo real y controlar tu red de proveedores.
        </p>
        <div style="display: flex; gap: 15px; margin-top: 25px;">
            <a href="{{ route('pedidos.create') }}" style="background: white; color: #2f9440; padding: 12px 25px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 0.9rem;">Nuevo Pedido</a>
            <a href="{{ route('empleados.create') }}" style="background: rgba(255,255,255,0.2); color: white; padding: 12px 25px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 0.9rem; border: 1px solid white;">Alta Empleado</a>
        </div>
    </div>
</div>

<div style="margin-top: 40px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="font-size: 1.3rem; color: #1e293b; font-weight: 700; margin: 0;">Actividad Reciente</h3>
        <a href="{{ route('pedidos.index') }}" style="color: #2f9440; text-decoration: none; font-size: 0.9rem; font-weight: 600;">Ver todo</a>
    </div>
    <div style="background: white; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); overflow: hidden; border: 1px solid #e2e8f0;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                    <th style="padding: 15px 20px; font-size: 0.75rem; color: #64748b; text-transform: uppercase; font-weight: 700;">Referencia</th>
                    <th style="padding: 15px 20px; font-size: 0.75rem; color: #64748b; text-transform: uppercase; font-weight: 700;">Estado</th>
                    <th style="padding: 15px 20px; font-size: 0.75rem; color: #64748b; text-transform: uppercase; font-weight: 700;">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 15px 20px; font-weight: 600; color: #1e293b;">#PED-2026-001</td>
                    <td style="padding: 15px 20px;">
                        <span style="background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; display: inline-block;">Completado</span>
                    </td>
                    <td style="padding: 15px 20px; color: #64748b; font-size: 0.9rem;">20 Feb 2026</td>
                </tr>
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 15px 20px; font-weight: 600; color: #1e293b;">#PED-2026-002</td>
                    <td style="padding: 15px 20px;">
                        <span style="background: #fef3c7; color: #92400e; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; display: inline-block;">Pendiente</span>
                    </td>
                    <td style="padding: 15px 20px; color: #64748b; font-size: 0.9rem;">19 Feb 2026</td>
                </tr>
                <tr>
                    <td style="padding: 15px 20px; font-weight: 600; color: #1e293b;">#PED-2026-003</td>
                    <td style="padding: 15px 20px;">
                        <span style="background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; display: inline-block;">Cancelado</span>
                    </td>
                    <td style="padding: 15px 20px; color: #64748b; font-size: 0.9rem;">18 Feb 2026</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection