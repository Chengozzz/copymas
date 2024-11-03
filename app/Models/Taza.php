<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taza extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['producto_id', 'color'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

