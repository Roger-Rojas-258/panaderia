<?php

use App\Http\Controllers\NotaventaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoofertaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('productosoferta/guardar', [ProductoofertaController::class, 'guadarDatos']);

Route::post('venta/guardar', [NotaventaController::class, 'guardarVenta']);