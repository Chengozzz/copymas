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
        Schema::create('vinil', function (Blueprint $table) {
            $table->id(); // ID
            $table->string('tamañoMedida'); // tamaño/medida
            $table->string('material'); // material: blanco, transparente
            $table->decimal('largo', 10, 2); // largo
            $table->decimal('largoRestante', 10, 2); // largo restante
            $table->timestamps(); // Mejora: para manejar fechas de creación y actualización
            $table->softDeletes(); // Soft Delete
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vinil');
    }
};