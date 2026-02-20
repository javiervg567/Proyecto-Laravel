@extends('layouts.app')

@section('content')
<div style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: #f8fafc;">
    <div style="width: 100%; max-width: 450px;">
        
        <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
            
            <div style="text-align: center; margin-bottom: 30px;">
                <div style="background: #e11d48; width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px auto; box-shadow: 0 4px 12px rgba(225, 29, 72, 0.2);">
                    <svg style="width: 30px; height: 30px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                </div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">¿Olvidaste tu clave?</h2>
                <p style="color: #64748b; margin-top: 8px; font-size: 0.95rem; line-height: 1.5;">No pasa nada. Introduce tu email y te enviaremos un enlace para recuperarla.</p>
            </div>

            @if (session('status'))
                <div style="background: #f0fdf4; color: #166534; padding: 15px; border-radius: 10px; margin-bottom: 25px; font-size: 0.9rem; border-left: 4px solid #22c55e;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div style="margin-bottom: 25px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; transition: border-color 0.2s;"
                        placeholder="tu-email@empresa.com">
                </div>

                <button type="submit" style="width: 100%; background: #1e293b; color: white; padding: 14px; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    Enviar enlace de recuperación
                </button>
            </form>
        </div>

        <p style="text-align: center; margin-top: 25px; color: #64748b; font-size: 0.9rem;">
            ¿Te has acordado? <a href="{{ route('login') }}" style="color: #2f9440; font-weight: 700; text-decoration: none;">Volver al login</a>
        </p>
    </div>
</div>

<style>
    input:focus {
        outline: none;
        border-color: #1e293b !important;
        box-shadow: 0 0 0 4px rgba(30, 41, 59, 0.1);
    }
    button:hover {
        background: #0f172a !important;
        transform: translateY(-1px);
    }
</style>
@endsection