<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lona extends Model
{
    //protected $table = 'lona'; // Asegúrate de que el nombre de la tabla sea 'lona'

    use HasFactory, SoftDeletes;

    protected $fillable = ['producto_id', 'tamañoMedida', 'largo', 'largoRestante'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

