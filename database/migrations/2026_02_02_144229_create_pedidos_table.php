<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        // Relación con Clientes: Si se borra el cliente, se borran sus pedidos (onDelete cascade)
        $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
        // Relación con Productos
        $table->foreignId('producto_id')->constrained()->onDelete('cascade');
        
        $table->integer('cantidad');
        $table->decimal('total', 10, 2);
        $table->date('fecha_pedido');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
