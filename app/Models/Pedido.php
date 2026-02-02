<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id', 'producto_id', 'cantidad', 'total', 'fecha_pedido'];

// Un pedido pertenece a un cliente
public function cliente() {
    return $this->belongsTo(Cliente::class);
}

// Un pedido pertenece a un producto
public function producto() {
    return $this->belongsTo(Producto::class);
}
}
