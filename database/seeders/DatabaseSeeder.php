<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'Admin CRMVALLE',
            'email' => 'admin@crmvalle.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        
        User::create([
            'name' => 'Usuario Vendedor',
            'email' => 'vendedor@crmvalle.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

       
        Cliente::create([
            'nombre' => 'Javier Valle',
            'email' => 'javier@cliente.com',
            'telefono' => '123456789',
        ]);

        Producto::create([
            'nombre' => 'Iphone 14 Pro',
            'precio' => 1000.00,
            'stock' => 10,
        ]);
    }
}