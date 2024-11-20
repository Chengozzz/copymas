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
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');

         //   $table->foreignId('nombreCliente')->constraided('clientes'); // nombreCliente
            $table->date('fecha'); // Fecha
            
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); // Cambia a `set null` si el producto puede eliminarse 
                        // Clave foránea para el producto, siguiendo la convención `producto_id`
            $table->decimal('total', 10, 2); // total
            $table->integer('cantidadProductos'); // cantidadProductos
            $table->string('estadoActual'); // estadoActual
            $table->string('medio'); //  por donde se recibió)
            $table->decimal('anticipo', 10, 2)->nullable(); // anticipo
            $table->boolean('entregado')->default(false); // entregado
            $table->boolean('metodoPago'); // metodo de pago 0 persona/ 1digital
            $table->timestamps(); //  para manejar fechas de creación y actualización
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
