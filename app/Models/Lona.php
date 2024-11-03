<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lona extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['producto_id', 'tamañoMedida', 'largo', 'largoRestante'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

