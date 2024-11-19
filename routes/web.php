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

    Route::get('/pedidos', [ProductoController::class, 'index2'])->name('pedidos');
    Route::get('/crearPedidos', [ProductoController::class, 'crearPedidos'])->name('crearPedidos');
    Route::post('/pedidosStore', [ProductoController::class, 'store'])->name('pedidosStore');

    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
  //  Route::get('/stock-productos', [StockController::class, 'index'])->name('stock.productos');
   // Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
    //Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');
});

require __DIR__.'/auth.php';
