@extends('layouts.app')

@section('content')
<div style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: #f8fafc;">
    <div style="width: 100%; max-width: 450px;">
        
        <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
            
            <div style="text-align: center; margin-bottom: 35px;">
                <div style="background: #2f9440; width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px auto; box-shadow: 0 4px 12px rgba(47, 148, 64, 0.3);">
                    <img src="{{ asset('images/logo.png') }}" alt="L" style="width: 35px; height: auto; filter: brightness(0) invert(1);">
                </div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">Bienvenido a CRMVALLE</h2>
                <p style="color: #64748b; margin-top: 8px; font-size: 0.95rem;">Introduce tus credenciales para acceder</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; transition: border-color 0.2s;"
                        placeholder="nombre@empresa.com">
                </div>

                <div style="margin-bottom: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <label style="font-size: 0.85rem; font-weight: 600; color: #475569;">Contraseña</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="font-size: 0.8rem; color: #2f9440; text-decoration: none; font-weight: 600;">¿La has olvidado?</a>
                        @endif
                    </div>
                    <input type="password" name="password" required 
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; transition: border-color 0.2s;"
                        placeholder="••••••••">
                </div>

                <div style="display: flex; align-items: center; margin-bottom: 25px;">
                    <input type="checkbox" name="remember" id="remember" style="width: 16px; height: 16px; accent-color: #2f9440; cursor: pointer;">
                    <label for="remember" style="margin-left: 8px; font-size: 0.9rem; color: #64748b; cursor: pointer;">Recordar sesión</label>
                </div>

                <button type="submit" style="width: 100%; background: #2f9440; color: white; padding: 14px; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(47, 148, 64, 0.2);">
                    Iniciar Sesión
                </button>
            </form>
        </div>

        <p style="text-align: center; margin-top: 25px; color: #64748b; font-size: 0.9rem;">
            ¿No tienes cuenta? <a href="{{ route('register') }}" style="color: #2f9440; font-weight: 700; text-decoration: none;">Regístrate aquí</a>
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