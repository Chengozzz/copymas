<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});
//==Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [ProductoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/productos', [ProductoController::class, 'indexProductos'])->name('productos');
    Route::get('/crearProductos', [ProductoController::class, 'crearProductos'])->name('crearProductos');
    Route::post('/productoStore', [ProductoController::class, 'productoStore'])->name('productoStore');

    Route::get('/pedidos', [ProductoController::class, 'index2'])->name('pedidos');
    Route::get('/crearPedidos', [ProductoController::class, 'crearPedidos'])->name('crearPedidos');
    Route::post('/pedidosStore', [ProductoController::class, 'store'])->name('pedidosStore');

   //editar pedido
    Route::get('/pedidos/{id}/editar', [ProductoController::class, 'editarPedido'])->name('editarPedido');
    Route::put('/pedidos/{id}', [ProductoController::class, 'actualizarPedido'])->name('actualizarPedido');
    //borrar pedido
    Route::delete('/pedidos/{id}', [ProductoController::class, 'borrarPedido'])->name('borrarPedido');


    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
    Route::get('/crearCliente', [ClienteController::class, 'crearCliente'])->name('crearCliente');
    Route::post('/clienteStore', [ClienteController::class, 'store'])->name('clienteStore');
    
    //boton aumentar/ disminuir cantidad productos in stock
    Route::put('/productos/{id}/incrementar', [ProductoController::class, 'aumentarCantidad'])->name('aumentarCantidad');
    Route::put('/productos/{id}/disminuir', [ProductoController::class, 'disminuirCantidad'])->name('disminuirCantidad');

});

require __DIR__.'/auth.php';
