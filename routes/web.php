<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\NotaventaController;
use App\Http\Controllers\PrivilegioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoofertaController;
use App\Http\Controllers\RepartidorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TipoproductoController;
use App\Http\Controllers\TipovehiculoController;
use App\Http\Controllers\TipopagoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarritoController;

use App\Models\Detalleventa;
use App\Models\Producto;
use App\Models\Productooferta;
use App\Models\Tipoproducto;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
})->name('welcome');

/*GUIA
Route::get('cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::get('cliente/edit/{id_cliente}', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::get('cliente/show/{ci}', [ClienteController::class, 'show'])->name('cliente.show');
Route::post('cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
Route::put('cliente/update/{ci}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('cliente/destroy/{ci}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
 */

Route::middleware(['auth'])->group(function () {

    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');

    //tipo producto
    Route::get('tipoproducto/', [TipoproductoController::class, 'index'])->name('tipoproducto.index');
    Route::get('tipoproducto/create', [TipoproductoController::class, 'create'])->name('tipoproducto.create');
    Route::post('tipoproducto/store', [TipoproductoController::class, 'store'])->name('tipoproducto.store');
    Route::get('/tipoproducto/edit/{id}', [TipoproductoController::class, 'edit'])->name('tipoproducto.edit');
    Route::put('/tipoproducto/update/{id}', [TipoproductoController::class, 'update'])->name('tipoproducto.update');
    Route::delete('/tipoproducto/destroy/{id}', [TipoproductoController::class, 'destroy'])->name('tipoproducto.destroy');
    Route::get('tipoproducto/eliminados', [TipoproductoController::class, 'eliminados'])->name('tipoproducto.eliminados');
    Route::get('tipoproducto/restablecer/{tipoId}', [TipoproductoController::class, 'cambiarEstado'])->name('tipoproducto.restablecer');

    //producto
    Route::get('producto/', [ProductoController::class, 'index'])->name('producto.index');
    Route::get('producto/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('producto/store', [ProductoController::class, 'store'])->name('producto.store');
    Route::get('/producto/edit/{id}', [ProductoController::class, 'edit'])->name('producto.edit');
    Route::put('/producto/update/{id}', [ProductoController::class, 'update'])->name('producto.update');
    Route::delete('/producto/destroy/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');
    Route::get('producto/eliminados', [ProductoController::class, 'eliminados'])->name('producto.eliminados');
    Route::get('producto/restablecer/{tipoId}', [ProductoController::class, 'cambiarEstado'])->name('producto.restablecer');

    //tipo vehiculo
    Route::get('tipovehiculo/', [TipovehiculoController::class, 'index'])->name('tipovehiculo.index');
    Route::get('tipovehiculo/create', [TipovehiculoController::class, 'create'])->name('tipovehiculo.create');
    Route::post('tipovehiculo/store', [TipovehiculoController::class, 'store'])->name('tipovehiculo.store');
    Route::get('/tipovehiculo/edit/{id}', [TipovehiculoController::class, 'edit'])->name('tipovehiculo.edit');
    Route::put('/tipovehiculo/update/{id}', [TipovehiculoController::class, 'update'])->name('tipovehiculo.update');
    Route::delete('/tipovehiculo/destroy/{id}', [TipovehiculoController::class, 'destroy'])->name('tipovehiculo.destroy');
    Route::get('tipovehiculo/eliminados', [TipovehiculoController::class, 'eliminados'])->name('tipovehiculo.eliminados');
    Route::get('tipovehiculo/restablecer/{tipoId}', [TipovehiculoController::class, 'cambiarEstado'])->name('tipovehiculo.restablecer');

    //tipo pagos
    Route::get('tipopago/', [TipopagoController::class, 'index'])->name('tipopago.index');
    Route::get('tipopago/create', [TipopagoController::class, 'create'])->name('tipopago.create');
    Route::post('tipopago/store', [TipopagoController::class, 'store'])->name('tipopago.store');
    Route::get('/tipopago/edit/{id}', [TipopagoController::class, 'edit'])->name('tipopago.edit');
    Route::put('/tipopago/update/{id}', [TipopagoController::class, 'update'])->name('tipopago.update');
    Route::delete('/tipopago/destroy/{id}', [TipopagoController::class, 'destroy'])->name('tipopago.destroy');
    Route::get('tipopago/eliminados', [TipopagoController::class, 'eliminados'])->name('tipopago.eliminados');
    Route::get('tipopago/restablecer/{tipoId}', [TipopagoController::class, 'cambiarEstado'])->name('tipopago.restablecer');

    //empleado
    Route::get('empleado/', [EmpleadoController::class, 'index'])->name('empleado.index');
    Route::get('empleado/create', [EmpleadoController::class, 'create'])->name('empleado.create');
    Route::post('empleado/store', [EmpleadoController::class, 'store'])->name('empleado.store');
    Route::get('/empleado/edit/{id}', [EmpleadoController::class, 'edit'])->name('empleado.edit');
    Route::put('/empleado/update/{id}', [EmpleadoController::class, 'update'])->name('empleado.update');
    Route::delete('/empleado/destroy/{id}', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');
    Route::get('empleado/eliminados', [EmpleadoController::class, 'eliminados'])->name('empleado.eliminados');
    Route::get('empleado/restablecer/{tipoId}', [EmpleadoController::class, 'cambiarEstado'])->name('empleado.restablecer');

    //cliente /*para cajero */
    Route::get('cliente/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::put('/cliente/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete('/cliente/destroy/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
    Route::get('cliente/eliminados', [ClienteController::class, 'eliminados'])->name('cliente.eliminados');
    Route::get('cliente/restablecer/{tipoId}', [ClienteController::class, 'cambiarEstado'])->name('cliente.restablecer');

    //privilegios
    Route::get('privilegio/', [PrivilegioController::class, 'index'])->name('privilegio.index');
    Route::get('privilegio/create', [PrivilegioController::class, 'create'])->name('privilegio.create');
    Route::post('privilegio/store', [PrivilegioController::class, 'store'])->name('privilegio.store');
    Route::get('/privilegio/edit/{id}', [PrivilegioController::class, 'edit'])->name('privilegio.edit');
    Route::put('/privilegio/update/{id}', [PrivilegioController::class, 'update'])->name('privilegio.update');
    Route::delete('/privilegio/destroy/{id}', [PrivilegioController::class, 'destroy'])->name('privilegio.destroy');
    Route::get('privilegio/eliminados', [PrivilegioController::class, 'eliminados'])->name('privilegio.eliminados');
    Route::get('privilegio/restablecer/{tipoId}', [PrivilegioController::class, 'cambiarEstado'])->name('privilegio.restablecer');

    //Vehiculo
    Route::get('vehiculo/', [VehiculoController::class, 'index'])->name('vehiculo.index');
    Route::get('vehiculo/create', [VehiculoController::class, 'create'])->name('vehiculo.create');
    Route::post('vehiculo/store', [VehiculoController::class, 'store'])->name('vehiculo.store');
    Route::get('/vehiculo/edit/{id}', [VehiculoController::class, 'edit'])->name('vehiculo.edit');
    Route::put('/vehiculo/update/{id}', [VehiculoController::class, 'update'])->name('vehiculo.update');
    Route::delete('/vehiculo/destroy/{id}', [VehiculoController::class, 'destroy'])->name('vehiculo.destroy');
    Route::get('vehiculo/eliminados', [VehiculoController::class, 'eliminados'])->name('vehiculo.eliminados');
    Route::get('vehiculo/restablecer/{tipoId}', [VehiculoController::class, 'cambiarEstado'])->name('vehiculo.restablecer');

    //Repartidor
    Route::get('repartidor/', [RepartidorController::class, 'index'])->name('repartidor.index');
    Route::get('repartidor/create', [RepartidorController::class, 'create'])->name('repartidor.create');
    Route::post('repartidor/store', [RepartidorController::class, 'store'])->name('repartidor.store');
    Route::get('/repartidor/edit/{id}', [RepartidorController::class, 'edit'])->name('repartidor.edit');
    Route::put('/repartidor/update/{id}', [RepartidorController::class, 'update'])->name('repartidor.update');
    Route::delete('/repartidor/destroy/{id}', [RepartidorController::class, 'destroy'])->name('repartidor.destroy');
    Route::get('repartidor/eliminados', [RepartidorController::class, 'eliminados'])->name('repartidor.eliminados');
    Route::get('repartidor/restablecer/{tipoId}', [RepartidorController::class, 'cambiarEstado'])->name('repartidor.restablecer');

    // rol
    Route::get('roles/', [RolController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RolController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [RolController::class, 'store'])->name('roles.store');
    Route::get('/roles/edit/{id}', [RolController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/update/{id}', [RolController::class, 'update'])->name('roles.update');
    Route::delete('/roles/destroy/{id}', [RolController::class, 'destroy'])->name('roles.destroy');
    Route::get('roles/eliminados', [RolController::class, 'eliminados'])->name('roles.eliminados');
    Route::get('roles/restablecer/{id}', [RolController::class, 'cambiarEstado'])->name('roles.restablecer');

    //usuario
    Route::get('usuario/', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::post('usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/usuario/edit/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::put('/usuario/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::delete('/usuario/destroy/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
    Route::get('usuario/eliminados', [UsuarioController::class, 'eliminados'])->name('usuario.eliminados');
    Route::get('usuario/restablecer/{tipoId}', [UsuarioController::class, 'cambiarEstado'])->name('usuario.restablecer');

    //oferta dia /*para cajero */
    Route::get('/productosoferta', [ProductoofertaController::class, 'index'])->name('productosoferta.index');
    Route::get('productosoferta/create', [ProductoofertaController::class, 'create'])->name('productosoferta.create');
    Route::post('productosoferta/store', [ProductoofertaController::class, 'store'])->name('productosoferta.store');
    Route::get('productosoferta/edit/{id}/{id_oferta}', [ProductoofertaController::class, 'edit'])->name('productosoferta.edit');
    Route::put('productosoferta/update/{id}/{id_oferta}', [ProductoofertaController::class, 'update'])->name('productosoferta.update');

    //venta /*para cajero */
    Route::get('venta/', [NotaventaController::class, 'index'])->name('venta.index');
    Route::get('venta/list', [NotaventaController::class, 'auxiliar'])->name('venta.list');
    Route::delete('/venta/destroy/{id}', [NotaventaController::class, 'destroy'])->name('venta.destroy');
    Route::get('venta/eliminados', [NotaventaController::class, 'eliminados'])->name('venta.eliminados');
    Route::get('venta/restablecer/{tipoId}', [NotaventaController::class, 'cambiarEstado'])->name('venta.restablecer');

    // home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// login
Auth::routes();

// carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
