<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;

Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);
