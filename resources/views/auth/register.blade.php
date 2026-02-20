@extends('layouts.app')

@section('content')
<div style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: #f8fafc;">
    <div style="width: 100%; max-width: 500px;">
        
        <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
            
            <div style="text-align: center; margin-bottom: 30px;">
                <div style="background: #2f9440; width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px auto; box-shadow: 0 4px 12px rgba(47, 148, 64, 0.3);">
                    <img src="{{ asset('images/logo.png') }}" alt="L" style="width: 35px; height: auto; filter: brightness(0) invert(1);">
                </div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">Crear Cuenta</h2>
                <p style="color: #64748b; margin-top: 8px; font-size: 0.95rem;">Únete a CRMVALLE y gestiona tu empresa</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Nombre Completo</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus 
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; transition: border-color 0.2s;"
                        placeholder="Juan Pérez">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; transition: border-color 0.2s;"
                        placeholder="ejemplo@correo.com">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Contraseña</label>
                    <input type="password" name="password" required 
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem;"
                        placeholder="Mínimo 8 caracteres">
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" required 
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem;"
                        placeholder="Repite tu contraseña">
                </div>

                <button type="submit" style="width: 100%; background: #2f9440; color: white; padding: 14px; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(47, 148, 64, 0.2);">
                    Crear mi cuenta
                </button>
            </form>
        </div>

        <p style="text-align: center; margin-top: 25px; color: #64748b; font-size: 0.9rem;">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}" style="color: #2f9440; font-weight: 700; text-decoration: none;">Inicia sesión</a>
        </p>
    </div>
</div>

<style>
    input:focus {
        outline: none;
        border-color: #2f9440 !important;
        box-shadow: 0 0 0 4px rgba(47, 148, 64, 0.1);
    }
    button:hover {
        background: #247a33 !important;
        transform: translateY(-1px);
        box-shadow: 0 6px 12px rgba(47, 148, 64, 0.3) !important;
    }
</style>
@endsection