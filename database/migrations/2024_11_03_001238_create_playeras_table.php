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
        Schema::create('playeras', function (Blueprint $table) {
            $table->id(); // ID
            $table->string('talla'); // talla
            $table->string('color'); // color
            $table->string('material'); // material
            
            $table->timestamps(); // Mejora: para manejar fechas de creación y actualización
            $table->softDeletes(); // Soft Delete
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playeras');
    }
};
