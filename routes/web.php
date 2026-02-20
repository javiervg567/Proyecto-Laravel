<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Auth;

// Redirección inicial: Si no está logueado, va al login
Route::get('/', function () {
    return Auth::check() ? view('dashboard') : view('auth.login');
})->name('dashboard');

// Grupo de rutas protegidas (Solo usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    
    // Recursos principales
    Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('pedidos', PedidoController::class);

    
});


Auth::routes();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
