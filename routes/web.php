 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\JQueryController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\SessionsController;
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

/* Route::get('/', function () { return view('sitio.index'); })->name('inicio');
Route::get('quienes_somos', function () { return view('sitio.quienesSomos');})->name('quienesSomos');
Route::get('listado_productos', [ProductosController::class, 'sitioIndex'])->name('productos');
Route::get('contacto', function () { return view('sitio.contacto');})->name('contacto'); */

Route::get('/', [SessionsController::class, 'index'])->middleware('guest')->name('login'); 
    //Ruta para inicar sesión, middleware para no acceder a ninguna pagina del sistema
Route::post('logueo', [SessionsController::class, 'logueo'])->name('logueo');
    //Ruta para obtener los datos del loguin e iniciar sesion
Route::get('logout', [SessionsController::class, 'logout'])->name('logout');
    //Ruta para cerrar sesión

Route::get('mi_perfil', [SessionsController::class, 'mi_perfil'])->middleware('auth');
Route::get('actulizar_datos/{id}', [SessionsController::class, 'actulizar_datos'])->middleware('auth');
Route::patch('update/{id}', [SessionsController::class, 'update_datos'])->middleware('auth');
Route::patch('foto_perfil/{id}', [SessionsController::class, 'foto_perfil'])->middleware('auth');

Route::prefix('cliente')->group(function () {
    Route::get('/', [ClientesController::class, 'sitio'])->middleware('auth');
    Route::get('productos', [ClientesController::class, 'productos'])->name('cliente.productos')->middleware('auth');
    Route::get('preventas/{id}',[VentasController::class, 'indexCli'])->middleware('auth');
    Route::get('preventa',[ClientesController::class, 'preventa'])->middleware('auth');
    Route::get('contacto',[ClientesController::class, 'contacto'])->middleware('auth');
});

Route::get("datos01", [JQueryController::class, "datos01"])->name("datos01");
Route::get("datos02", [JQueryController::class, "datos02"])->name("datos02");
Route::get("datos03", [JQueryController::class, "datos03"])->name("datos03");
Route::get("datos_entradas", [JQueryController::class, "datos_entradas"])->name("datos_entradas");
Route::get("datos06", [JQueryController::class, "datos06"])->name("datos06");
Route::get("datos04", [JQueryController::class, "datos04"])->name("datos04");
Route::get("js02", [JQueryController::class, "js02"])->name("js02");

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsersController::class, 'list'])->middleware('auth.admin');
    Route::get('nuevo', [UsersController::class, 'index'])->middleware('auth.admin');
    Route::post('register', [UsersController::class, 'store'])->middleware('auth.admin');
    Route::get('editar/{id}', [UsersController::class, 'detalles'])->middleware('auth.admin');
    Route::put('salvar/{id}', [UsersController::class, 'update'])->middleware('auth.admin');
    Route::get('eliminar/{id}', [UsersController::class, 'destroy'])->middleware('auth.admin');
    Route::get('inactivo/{id}', [UsersController::class, 'inactivo'])->middleware('auth.admin');
    Route::get('activo/{id}', [UsersController::class, 'activo'])->middleware('auth.admin');
    Route::get('inactivos', [UsersController::class, 'inactivos'])->middleware('auth.admin');
    Route::get('pdf', [DocumentosController::class, 'UsersPdf'])->middleware('auth')->name('usuarios.pdf');
});

//Rutas para las acciones de los clientes ->middleware('auth.admin')
Route::prefix('clientes')->group(function () {
    Route::get('/', [ClientesController::class, 'index'])->middleware('auth');
    Route::get('nuevo', [ClientesController::class, 'create'])->middleware('auth.admin');
    Route::post('guardar', [ClientesController::class, 'store'])->middleware('auth.admin');
    Route::get('editar/{id}', [ClientesController::class, 'show'])->middleware('auth.admin');
    Route::patch('update/{id}', [ClientesController::class, 'update'])->middleware('auth.admin');
    Route::delete('eliminar/{id}', [ClientesController::class, 'destroy'])->middleware('auth.admin');
    Route::get('rutas', [ClientesController::class, 'rutas'])->middleware('auth');
    Route::post('salvarR', [ClientesController::class, 'guardarR']);
    Route::post('import', [DocumentosController::class, 'importClientes'])->middleware('auth.admin')->name('clientes.import');
    Route::post('import_rutas', [DocumentosController::class, 'importRutas'])->middleware('auth.admin')->name('clientes.import_rutas');
    Route::get('export', [DocumentosController::class, 'exportClientes'])->middleware('auth.admin')->name('clientes.export');
    Route::get('enviar_comprobante', [ClientesController::class, 'enviarComprobante'])->middleware('auth.admin');
    Route::post('send_comprobante', [ClientesController::class, 'sendComprobante'])->middleware('auth.admin');
    Route::get("datos02", [JQueryController::class, "datos02"])->name("datos02");
    Route::get("datos03", [JQueryController::class, "datos03"])->name("datos03");
});

Route::prefix('productos')->group( function (){
    Route::get('/', [ProductosController::class, 'index'])->middleware('auth');
    Route::get('nuevo', [ProductosController::class, 'create'])->middleware('auth.admin');
    Route::post('guardar', [ProductosController::class, 'store']);
    Route::get('show/{id}', [ProductosController::class, 'show'])->middleware('auth.admin');
    Route::patch('update/{id}', [ProductosController::class, 'update']);
    Route::delete('eliminar/{id}', [ProductosController::class, 'destroy'])->middleware('auth.admin');
    Route::get('pdf', [DocumentosController::class, 'Productospdf'])->middleware('auth')->name('productos.pdf');
    Route::post('import', [DocumentosController::class, 'importProductos'])->middleware('auth.admin')->name('productos.import');
    Route::get('export', [DocumentosController::class, 'exportProductos'])->middleware('auth.admin')->name('productos.export');
    
});

Route::prefix('ventas')->group(function () {
    Route::get('/', [VentasController::class, 'indexV'])->middleware('auth')->name('ventasPayPal');
    Route::get('nueva', [VentasController::class, 'createV'])->middleware('auth.admin');
    Route::get('js00', [JqueryController::class, 'js00']);
    //Route::get('js_productos', [JqueryController::class, 'js_productos']);
    Route::post('store', [VentasController::class, 'storeV']);
    Route::get('show/{id}', [VentasController::class, 'show'])->middleware('auth.admin');
    Route::get('imprimir/{codigo}', [DocumentosController::class, 'ComprobanteVentaPdf'])->middleware('auth');
    Route::get('comprobante/{codigo}', [DocumentosController::class, 'ComprobanteVentaPdfView'])->middleware('admin');
    Route::post('status/paypal', [PayPalController::class, 'statusVentas']);
    Route::get('pruebas', [VentasController::class, 'pruebas'])->middleware('auth.admin');
    Route::get('pagar/{id}', [VentasController::class, 'confPago'])->middleware('auth.admin');
});

Route::get('createPaypal',[PaypalController::class,'createPaypal'])->name('createPaypal');
Route::get('processPaypal',[PaypalController::class,'processPaypal'])->name('processPaypal');
Route::get('processSuccess',[PaypalController::class,'processSuccess'])->name('processSuccess');
Route::get('processCancel',[PaypalController::class,'processCancel'])->name('processCancel');

Route::prefix('preventas')->group(function () {
    Route::get('/', [VentasController::class, 'indexP'])->middleware('auth.admin');
    Route::get('preventa', [VentasController::class, 'createPCli']);
    Route::get('nueva', [VentasController::class, 'createP'])->middleware('auth.admin');
    Route::post('store', [VentasController::class, 'storeP']);
    Route::get('confirmar/{id}', [VentasController::class, 'verPreventa'])->middleware('auth.admin');
    Route::post('update', [VentasController::class, 'confPreventa'])->middleware('auth.admin');
});

Route::prefix('entradas')->group( function (){
    Route::get('/', [EntradasController::class, 'index'])->middleware('auth');
    Route::get('nueva', [EntradasController::class, 'list'])->middleware('auth.admin');
    Route::post('store', [EntradasController::class, 'store'])->middleware('auth.admin');{}
    Route::get('show/{id}', [EntradasController::class, 'show'])->middleware('auth.admin');
});