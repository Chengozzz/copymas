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
        Schema::create('lona', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->string('tamañoMedida'); // tamaño/medida
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
        Schema::dropIfExists('lona');
    }
};
