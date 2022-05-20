<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//   return view('inicio');
//});



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/pedidos', [App\Http\Controllers\PedidoController::class, 'pedidos_index'])->name('pedidos.general');
Route::get('/pedidos/buscar-cliente', [App\Http\Controllers\ClienteController::class, 'clientes_buscar'])->name('pedido_cliente.buscar');
Route::post('/pedidos/nuevo-pedido', [App\Http\Controllers\ClienteController::class, 'clientes_buscar_pedidos'])->name('pedido_cliente_buscar_datos');





Route::get('/configuracion', [App\Http\Controllers\ConfigController::class, 'empresa_index'])->name('configuracion.general');
Route::post('/configuracion-SaveEmpresa', [App\Http\Controllers\EmpresaController::class, 'empresa_save'])->name('configuracion.SaveEmpresa');



//--------------------------------------------------------------------------------------------------------------------------------------------------------------
// Rutas del Controlador del modulo Productos
//Rutas de GUI
Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'productos_index'])->name('productos.general');
Route::get('/productos/nuevo', [App\Http\Controllers\ProductoController::class, 'productos_create'])->name('productos.create');
Route::get('/productos/detalles', [App\Http\Controllers\ProductoController::class, 'productos_show'])->name('productos.ver');

//Rutas de acciones
Route::post('/productos-save', [App\Http\Controllers\ProductoController::class, 'productos_save'])->name('productos.save');



//--------------------------------------------------------------------------------------------------------------------------------------------------------------
// Rutas del Controlador del modulo Usuarios
//Rutas de GUI
Route::get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'usuarios_index'])->name('usuarios.general'); //ruta general
Route::get('/usuarios/nuevo', [App\Http\Controllers\UsuarioController::class, 'usuarios_create'])->name('usuarios.create'); //Ruta nuevos clientes
Route::get('/usuarios/{usuario}/actualizar', [App\Http\Controllers\UsuarioController::class, 'usuarios_update'])->name('usuarios.update'); //Ruta Actualizar Clientes
Route::get('/usuarios/{usuario}/informacion', [App\Http\Controllers\UsuarioController::class, 'usuarios_show'])->name('usuarios.show'); //Ruta Ver informacion Clientes

//Rutas de acciones
Route::post('/usuarios-save', [App\Http\Controllers\UsuarioController::class, 'usuarios_save'])->name('usuarios.save'); //Guardar
Route::post('/usuarios-edit/{usuario}', [App\Http\Controllers\UsuarioController::class, 'usuarios_edit'])->name('usuarios.edit'); //Actualizar
Route::delete('/usuarios-delete/{usuario}', [App\Http\Controllers\UsuarioController::class, 'usuarios_destroy'])->name('usuarios.destroy'); //Eliminar


//--------------------------------------------------------------------------------------------------------------------------------------------------------------
// Rutas del Controlador del modulo Clientes
//Rutas de GUI
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'clientes_index'])->name('clientes_general'); //ruta general
Route::get('/clientes/nuevo', [App\Http\Controllers\ClienteController::class, 'clientes_create'])->name('clientes_create'); // Ruta nuevos clientes
Route::get('/clientes/{cliente}/actualizar', [App\Http\Controllers\ClienteController::class, 'clientes_update'])->name('clientes.update'); //Ruta Actualizar Clientes
Route::get('/clientes/{cliente}/informacion', [App\Http\Controllers\ClienteController::class, 'clientes_show'])->name('clientes.show'); //Ruta Ver informacion Clientes

//Rutas de acciones
Route::post('/clientes-save', [App\Http\Controllers\ClienteController::class, 'clientes_save'])->name('clientes.save'); //Guardar
Route::post('/clientes-edit/{cliente}', [App\Http\Controllers\ClienteController::class, 'clientes_edit'])->name('clientes.edit'); //Actualizar
Route::delete('/clientes-delete/{cliente}', [App\Http\Controllers\ClienteController::class, 'clientes_destroy'])->name('clientes.destroy'); //Eliminar


//--------------------------------------------------------------------------------------------------------------------------------------------------------------
//Rutas del controlador del modulo Informes
Route::get('/Informes', [App\Http\Controllers\InformeController::class, 'informes_index'])->name('informes.general');

Route::get('/Informes/clientes', [App\Http\Controllers\InformeController::class, 'informes_clientes'])->name('informes.clientes');
Route::get('/Informes/clientes-general', [App\Http\Controllers\InformeController::class, 'informePDF_clientes'])->name('informe.pdf.clientes'); //informe clietnes



//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

Auth::routes();


