<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['cliente_id', 'producto_id', 'fecha', 'total', 
    'cantidad_productos', 'estado_actual', 'medio', 'anticipo', 'entregado', 'metodo_pago'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
