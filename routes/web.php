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


//--------------------------------------------------------------------------------------------------------------------------------------------------------------
// Rutas del Controlador del modulo Pedidos
//Rutas de GUI
Route::get('/pedidos', [App\Http\Controllers\PedidoController::class, 'pedidos_index'])->name('pedidos.general');
Route::get('/pedidos/buscar-cliente', [App\Http\Controllers\ClienteController::class, 'clientes_buscar'])->name('pedido_cliente.buscar');
Route::post('/pedidos/nuevo-pedido', [App\Http\Controllers\ClienteController::class, 'clientes_buscar_pedidos'])->name('pedido_cliente_buscar_datos');

//Rutas de acciones
Route::post('/pedidos-save', [App\Http\Controllers\PedidoController::class, 'pedidos_save'])->name('pedidos.save'); //Guardar
Route::post('/productos-edit/{producto}', [App\Http\Controllers\PedidoController::class, 'pedidos_edit'])->name('productos.edit'); //Actualizar
Route::delete('/productos-delete/{producto}', [App\Http\Controllers\PedidoController::class, 'pedidos_destroy'])->name('productos.destroy'); //Eliminar


//--------------------------------------------------------------------------------------------------------------------------------------------------------------
// Rutas del Controlador del modulo Configuracion
//Rutas de GUI
Route::get('/configuracion/{user}/', [App\Http\Controllers\ConfigController::class, 'empresa_index'])->name('configuracion.general');
Route::post('/configuracion-SaveEmpresa', [App\Http\Controllers\EmpresaController::class, 'empresa_save'])->name('configuracion.SaveEmpresa');



//--------------------------------------------------------------------------------------------------------------------------------------------------------------
// Rutas del Controlador del modulo Productos
//Rutas de GUI
Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'productos_index'])->name('productos.general');        //ruta general
Route::get('/productos/nuevo', [App\Http\Controllers\ProductoController::class, 'productos_create'])->name('productos.create');   //Ruta nuevos producos
Route::get('/productos/lista-productos', [App\Http\Controllers\ProductoController::class, 'productos_list'])->name('productos.list');     //Ruta Ver informacion de productos
Route::get('/productos/{producto}/actualizar', [App\Http\Controllers\ProductoController::class, 'productos_update'])->name('productos.update'); //Ruta Actualizar Clientes
Route::get('/productos/{producto}/detalles', [App\Http\Controllers\ProductoController::class, 'productos_show'])->name('productos.show');

//Rutas de acciones
Route::post('/productos-save', [App\Http\Controllers\ProductoController::class, 'productos_save'])->name('productos.save'); //Guardar
Route::post('/productos-edit/{producto}', [App\Http\Controllers\ProductoController::class, 'productos_edit'])->name('productos.edit'); //Actualizar
Route::delete('/productos-delete/{producto}', [App\Http\Controllers\ProductoController::class, 'productos_destroy'])->name('productos.destroy'); //Eliminar


//--------------------------------------------------------------------------------------------------------------------------------------------------------------
// Rutas del Controlador del modulo Usuarios
//Rutas de GUI
Route::get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'usuarios_index'])->name('usuarios.general'); //ruta general
Route::get('/usuarios/nuevo', [App\Http\Controllers\UsuarioController::class, 'usuarios_create'])->name('usuarios.create'); //Ruta de nuevos usuarios
Route::get('/usuarios/nuevo/datos', [App\Http\Controllers\UsuarioController::class, 'usuarios_datos'])->name('usuarios.datos'); //Ruta datos nuevos usuarios
Route::get('/usuarios/{usuario}/actualizar', [App\Http\Controllers\UsuarioController::class, 'usuarios_update'])->name('usuarios.update'); //Ruta Actualizar usuarios
Route::get('/usuarios/{usuario}/informacion', [App\Http\Controllers\UsuarioController::class, 'usuarios_show'])->name('usuarios.show'); //Ruta Ver informacion usuarios

//Rutas de acciones
Route::post('/usuarios-save', [App\Http\Controllers\UsuarioController::class, 'usuarios_informacion'])->name('usuarios.save'); //Guardar datos persona
Route::post('/usuarios-registro', [App\Http\Controllers\UsuarioController::class, 'usuarios_save'])->name('usuarios.registro'); //Guardar user
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

//Rutas de los informes
Route::get('/Informes/clientes', [App\Http\Controllers\InformeController::class, 'informes_clientes'])->name('informes.clientes');
Route::get('/Informes/clientes-general', [App\Http\Controllers\InformeController::class, 'informePDF_clientes'])->name('informe.pdf.clientes'); //informe clientes

Route::get('/Informes/Productos', [App\Http\Controllers\InformeController::class, 'informes_productos'])->name('informes.productos');
Route::get('/Informes/Productos-disponibles', [App\Http\Controllers\InformeController::class, 'InformePDF_ProductosDisponibles'])->name('informe.pdf.productosdisponibles'); //informe Productos
Route::get('/Informes/Productos-vencidos', [App\Http\Controllers\InformeController::class, 'InformePDF_ProductosVencidos'])->name('informe.pdf.productosvencidos'); //informe Productos


//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

Auth::routes();


