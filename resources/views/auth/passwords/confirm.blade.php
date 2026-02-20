@extends('layouts.app')

@section('content')
<div style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: #f8fafc;">
    <div style="width: 100%; max-width: 450px;">
        
        <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
            
            <div style="text-align: center; margin-bottom: 30px;">
                <div style="background: #f59e0b; width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px auto; box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);">
                    <svg style="width: 30px; height: 30px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">Zona Segura</h2>
                <p style="color: #64748b; margin-top: 8px; font-size: 0.95rem; line-height: 1.5;">Por tu seguridad, confirma tu contraseña para continuar.</p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div style="margin-bottom: 25px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <label style="font-size: 0.85rem; font-weight: 600; color: #475569;">Contraseña</label>
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; transition: border-color 0.2s;"
                        placeholder="••••••••" class="@error('password') is-invalid @enderror">
                    
                    @error('password')
                        <span style="color: #ef4444; font-size: 0.8rem; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" style="width: 100%; background: #2f9440; color: white; padding: 14px; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(47, 148, 64, 0.2); margin-bottom: 15px;">
                    Confirmar Acceso
                </button>

                @if (Route::has('password.request'))
                    <div style="text-align: center;">
                        <a href="{{ route('password.request') }}" style="font-size: 0.85rem; color: #64748b; text-decoration: none; font-weight: 500;">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                @endif
            </form>
        </div>
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
    }
</style>
@endsection