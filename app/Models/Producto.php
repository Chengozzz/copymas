<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'tipo'];

    public function lona()
    {
        return $this->hasOne(Lona::class);
    }

    public function vinil()
    {
        return $this->hasOne(Vinil::class);
    }

    public function taza()
    {
        return $this->hasOne(Taza::class);
    }

    public function playera()
    {
        return $this->hasOne(Playera::class);
    }
}
