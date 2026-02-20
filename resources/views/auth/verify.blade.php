@extends('layouts.app')

@section('content')
<div style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: #f8fafc;">
    <div style="width: 100%; max-width: 500px;">
        
        <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; text-align: center;">
            
            <div style="background: #eff6ff; width: 70px; height: 70px; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px auto;">
                <svg style="width: 35px; height: 35px; color: #3b82f6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>

            <h2 style="font-size: 1.6rem; color: #1e293b; font-weight: 700; margin-bottom: 15px;">Verifica tu correo</h2>
            
            <p style="color: #64748b; font-size: 1rem; line-height: 1.6; margin-bottom: 25px;">
                ¡Ya casi estás! Hemos enviado un enlace de confirmación a tu bandeja de entrada. Por favor, revísalo para activar tu cuenta.
            </p>

            @if (session('resent'))
                <div style="background: #f0fdf4; color: #166534; padding: 12px; border-radius: 10px; margin-bottom: 25px; font-size: 0.9rem; font-weight: 500; border: 1px solid #bbf7d0;">
                    {{ __('Se ha enviado un nuevo enlace a tu dirección de correo.') }}
                </div>
            @endif

            <div style="border-top: 1px solid #f1f5f9; pt-25px; margin-top: 25px; padding-top: 20px;">
                <p style="color: #94a3b8; font-size: 0.9rem; margin-bottom: 15px;">¿No has recibido nada?</p>
                
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" style="background: #2f9440; color: white; padding: 12px 25px; border: none; border-radius: 10px; font-size: 0.95rem; font-weight: 700; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(47, 148, 64, 0.2);">
                        Reenviar correo de verificación
                    </button>
                </form>
            </div>
        </div>

        <div style="text-align: center; margin-top: 25px;">
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               style="color: #64748b; text-decoration: none; font-size: 0.9rem; font-weight: 600;">
                ← Volver al inicio / Salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>

<style>
    button:hover {
        background: #247a33 !important;
        transform: translateY(-1px);
        box-shadow: 0 6px 12px rgba(47, 148, 64, 0.3) !important;
    }
</style>
@endsection