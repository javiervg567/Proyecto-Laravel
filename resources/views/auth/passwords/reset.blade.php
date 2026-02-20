@extends('layouts.app')

@section('content')
<div style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: #f8fafc;">
    <div style="width: 100%; max-width: 480px;">
        
        <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
            
            <div style="text-align: center; margin-bottom: 30px;">
                <div style="background: #2f9440; width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px auto; box-shadow: 0 4px 12px rgba(47, 148, 64, 0.2);">
                    <svg style="width: 30px; height: 30px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-3.04l.533-.811a7.122 7.122 0 00-.657-3.51 6.78 6.78 0 00-2.53-2.533 7.13 7.13 0 00-3.51-.656l-.811.533a3 3 0 01-3.21 0l-.811-.533a7.132 7.132 0 00-3.51.656 6.78 6.78 0 00-2.533 2.53 7.122 7.122 0 00-.656 3.51l.533.811a3 3 0 010 3.21l-.533.811a7.122 7.122 0 00.656 3.51 6.78 6.78 0 002.533 2.533 7.132 7.132 0 003.51.656l.811-.533a3 3 0 013.21 0l.811.533a7.13 7.13 0 003.51-.656 6.78 6.78 0 002.533-2.53 7.122 7.122 0 00.656-3.51l-.533-.811z"></path>
                    </svg>
                </div>
                <h2 style="font-size: 1.5rem; color: #1e293b; font-weight: 700; margin: 0;">Nueva Contraseña</h2>
                <p style="color: #64748b; margin-top: 8px; font-size: 0.95rem;">Establece tus nuevas credenciales de acceso</p>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; background: #f8fafc;" 
                        readonly>
                    @error('email')
                        <span style="color: #ef4444; font-size: 0.8rem; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Nueva Contraseña</label>
                    <input type="password" name="password" required autocomplete="new-password"
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; transition: border-color 0.2s;"
                        placeholder="Mínimo 8 caracteres">
                    @error('password')
                        <span style="color: #ef4444; font-size: 0.8rem; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #475569; margin-bottom: 8px;">Confirmar Nueva Contraseña</label>
                    <input type="password" name="password_confirmation" required autocomplete="new-password"
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; transition: border-color 0.2s;"
                        placeholder="Repite la contraseña">
                </div>

                <button type="submit" style="width: 100%; background: #2f9440; color: white; padding: 14px; border: none; border-radius: 10px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(47, 148, 64, 0.2);">
                    Actualizar Contraseña
                </button>
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
        box-shadow: 0 6px 15px rgba(47, 148, 64, 0.3) !important;
    }
</style>
@endsection