@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 40px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
        <div>
            <h2 style="font-size: 2.2rem; color: #1e293b; margin: 0; font-weight: 800; letter-spacing: -0.025em;">Panel de Control Integral</h2>
            <p style="color: #64748b; margin: 5px 0 0 0; font-size: 1.1rem;">Resumen operativo de CRMVALLE</p>
        </div>
        <div style="background: #f8fafc; padding: 12px 24px; border-radius: 8px; border: 1px solid #e2e8f0;">
            <span style="font-weight: 700; color: #1e293b; font-family: monospace; font-size: 1.1rem;">{{ date('d/m/Y') }}</span>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 40px;">
        
        <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-top: 4px solid #10b981;">
            <p style="color: #64748b; font-size: 0.85rem; margin: 0; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600;">Clientes Registrados</p>
            <h3 style="font-size: 2.5rem; margin: 10px 0 0; color: #0f172a; font-weight: 800;">{{ \App\Models\Cliente::count() }}</h3>
        </div>

        <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-top: 4px solid #3b82f6;">
            <p style="color: #64748b; font-size: 0.85rem; margin: 0; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600;">Ventas Totales</p>
            <h3 style="font-size: 2.5rem; margin: 10px 0 0; color: #0f172a; font-weight: 800;">{{ \App\Models\Pedido::count() }}</h3>
        </div>

        <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-top: 4px solid #f59e0b;">
            <p style="color: #64748b; font-size: 0.85rem; margin: 0; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600;">Facturación Acumulada</p>
            <h3 style="font-size: 2.5rem; margin: 10px 0 0; color: #0f172a; font-weight: 800;">{{ number_format(\App\Models\Pedido::sum('total'), 2) }}€</h3>
        </div>

        <div style="background: white; padding: 25px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-top: 4px solid #6366f1;">
            <p style="color: #64748b; font-size: 0.85rem; margin: 0; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600;">Unidades en Stock</p>
            <h3 style="font-size: 2.5rem; margin: 10px 0 0; color: #0f172a; font-weight: 800;">{{ \App\Models\Producto::sum('stock') }}</h3>
        </div>
    </div>

    <div style="background: white; padding: 0; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); overflow: hidden;">
        <div style="padding: 20px 30px; border-bottom: 1px solid #f1f5f9; background: #fafafa;">
            <h3 style="margin: 0; color: #1e293b; font-size: 1.2rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.025em;">Últimos Pedidos en el Sistema</h3>
        </div>
        
        <div style="padding: 10px 30px 30px 30px;">
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr style="text-align: left; border-bottom: 2px solid #e2e8f0;">
                        <th style="padding: 15px 12px; color: #475569; font-size: 0.85rem; text-transform: uppercase;">Cliente</th>
                        <th style="padding: 15px 12px; color: #475569; font-size: 0.85rem; text-transform: uppercase;">Producto</th>
                        <th style="padding: 15px 12px; color: #475569; font-size: 0.85rem; text-transform: uppercase;">Importe</th>
                        <th style="padding: 15px 12px; color: #475569; font-size: 0.85rem; text-transform: uppercase;">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\Pedido::with(['cliente', 'producto'])->latest()->take(5)->get() as $pedido)
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 15px 12px; color: #1e293b; font-weight: 600;">{{ $pedido->cliente->nombre }}</td>
                        <td style="padding: 15px 12px; color: #64748b;">{{ $pedido->producto->nombre }}</td>
                        <td style="padding: 15px 12px; color: #10b981; font-weight: 700;">{{ number_format($pedido->total, 2) }}€</td>
                        <td style="padding: 15px 12px; color: #94a3b8; font-size: 0.9rem;">{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="padding: 40px; text-align: center; color: #94a3b8; font-style: italic;">No hay registros de pedidos recientes.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection