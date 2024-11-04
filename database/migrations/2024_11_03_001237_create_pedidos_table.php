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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('nombreCliente')->constraided('clientes'); // nombreCliente
            $table->date('fecha'); // Fecha
            $table->foreignId('productoComprado')->constrained('productos'); // productoComprado (Mejora: relación con productos)
            $table->decimal('total', 10, 2); // total
            $table->integer('cantidadProductos'); // cantidadProductos
            $table->string('estadoActual'); // estadoActual
            $table->string('medio'); // (Mejora: por donde se recibió)
            $table->decimal('anticipo', 10, 2)->nullable(); // anticipo
            $table->boolean('entregado')->default(false); // entregado
            $table->string('metodoPago'); // metodo de pago
            $table->timestamps(); // Mejora: para manejar fechas de creación y actualización
            $table->softDeletes(); // Soft Delete
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
