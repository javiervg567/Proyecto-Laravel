@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 40px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2 style="font-size: 2rem; color: #1f2937; margin-bottom: 5px;">Panel de Control Integral</h2>
            <p style="color: #64748b; margin-top: 0;">Resumen general de actividad en CRMVALLE</p>
        </div>
        <div style="background: white; padding: 10px 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <span style="font-weight: bold; color: var(--primary);">{{ date('d/m/Y') }}</span>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 40px;">
        
        <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 5px solid #10b981;">
            <p style="color: #64748b; font-size: 0.9rem; margin: 0; text-transform: uppercase;">Clientes Registrados</p>
            <h3 style="font-size: 2.2rem; margin: 10px 0 0; color: #111827;">{{ \App\Models\Cliente::count() }}</h3>
        </div>

        <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 5px solid #3b82f6;">
            <p style="color: #64748b; font-size: 0.9rem; margin: 0; text-transform: uppercase;">Ventas Totales</p>
            <h3 style="font-size: 2.2rem; margin: 10px 0 0; color: #111827;">{{ \App\Models\Pedido::count() }}</h3>
        </div>

        <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 5px solid #f59e0b;">
            <p style="color: #64748b; font-size: 0.9rem; margin: 0; text-transform: uppercase;">Facturación</p>
            <h3 style="font-size: 2.2rem; margin: 10px 0 0; color: #111827;">{{ number_format(\App\Models\Pedido::sum('total'), 2) }}€</h3>
        </div>

        <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 5px solid #6366f1;">
            <p style="color: #64748b; font-size: 0.9rem; margin: 0; text-transform: uppercase;">Stock Total</p>
            <h3 style="font-size: 2.2rem; margin: 10px 0 0; color: #111827;">{{ \App\Models\Producto::sum('stock') }}</h3>
        </div>
    </div>

    <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <h3 style="margin-top: 0; margin-bottom: 25px; color: #1f2937; display: flex; align-items: center;">
            <span style="background: #10b981; width: 10px; height: 10px; border-radius: 50%; display: inline-block; margin-right: 10px;"></span>
            Últimos Pedidos en el Sistema
        </h3>
        
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid #f3f4f6;">
                    <th style="padding: 12px; color: #64748b;">Cliente</th>
                    <th style="padding: 12px; color: #64748b;">Producto</th>
                    <th style="padding: 12px; color: #64748b;">Importe</th>
                    <th style="padding: 12px; color: #64748b;">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse(\App\Models\Pedido::latest()->take(5)->get() as $pedido)
                <tr style="border-bottom: 1px solid #f3f4f6;">
                    <td style="padding: 12px;"><strong>{{ $pedido->cliente->nombre }}</strong></td>
                    <td style="padding: 12px;">{{ $pedido->producto->nombre }}</td>
                    <td style="padding: 12px; color: #10b981; font-weight: bold;">{{ number_format($pedido->total, 2) }}€</td>
                    <td style="padding: 12px; color: #94a3b8;">{{ $pedido->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 20px; text-align: center; color: #94a3b8;">No hay pedidos registrados todavía.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection