<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vinil extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['producto_id', 'tamañoMedida','material' , 'largo', 'largoRestante'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
