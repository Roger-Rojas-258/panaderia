<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoproductoController;
use App\Models\Producto;
use App\Models\Tipoproducto;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
/*GUIA
Route::get('cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::get('cliente/edit/{id_cliente}', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::get('cliente/show/{ci}', [ClienteController::class, 'show'])->name('cliente.show');
Route::post('cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
Route::put('cliente/update/{ci}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('cliente/destroy/{ci}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
 */

//producto
Route::get('producto/', [ProductoController::class, 'index'])->name('producto.index');
Route::get('producto/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('producto/store', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/producto/edit/{id}', [ProductoController::class, 'edit'])->name('producto.edit');
Route::put('/producto/update/{id}', [ProductoController::class, 'update'])->name('producto.update');
Route::delete('/producto/destroy/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');


//tipo producto
Route::get('tipoproducto/', [TipoproductoController::class, 'index'])->name('tipoproducto.index');
Route::get('tipoproducto/create', [TipoproductoController::class, 'create'])->name('tipoproducto.create');
Route::post('tipoproducto/store', [TipoproductoController::class, 'store'])->name('tipoproducto.store');
Route::get('/tipoproducto/edit/{id}', [TipoproductoController::class, 'edit'])->name('tipoproducto.edit');
Route::put('/tipoproducto/update/{id}', [TipoproductoController::class, 'update'])->name('tipoproducto.update');
Route::delete('/tipoproducto/destroy/{id}', [TipoproductoController::class, 'destroy'])->name('tipoproducto.destroy');

//