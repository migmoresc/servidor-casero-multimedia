<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\PasarTipoAVistaMiddleware;

// use App\Http\Controllers\HomeController;

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

// Route::get('/', HomeController::class);

// Route::get('ruta1',[HomeController::class,'index']);
// Route::get('a/{b}/{c?}',function($b,$c=null){

// });

// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'lista');
//     Route::post('/orders', 'crear');
// });

Route::get('/', function () {
    // $usuarios = Usuario::all();

    // Mail::to('cursowebingenieria@gmail.com')->send(new RegistroMailable);
    // return view('home', ['users' => $usuarios]);
    // use Illuminate\Support\Facades\App;
    return view('login', ['mostrar_password' => trans('messages.show_password'), 'ocultar_password' => trans('messages.hide_password')]);
})->name('login');

Route::get('/config{idioma?}{dia?}', [ConfigController::class, 'config'])->name('config.guardar');

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/home', 'principal')->name('usuario.home.principal')->middleware('auth');
    Route::post('/entrar', 'autenticar')->name('usuario.entrar.autenticar');
    Route::get('/salir', 'salir')->name('usuario.salir.salir');
    Route::post('/registrarse', 'guardar')->name('usuario.registrarse.guardar');
    Route::get('/verificar/{cod}', 'verificar_codigo')->name('usuario.verificar.verificar_codigo');
    Route::get('/verificar', 'verificar')->name('usuario.verificar.verificar');
    Route::get('/condiciones', 'condiciones_mostrar')->name('usuario.condiciones.mostrar');
    Route::post('/condiciones', 'condiciones_aprobar')->name('usuario.condiciones.aprobar');
    Route::get('/cuenta', 'cuenta_mostrar')->name('usuario.cuenta.mostrar');
    Route::post('/cuenta', 'cuenta_modificar')->name('usuario.cuenta.modificar');
    Route::delete('/cuenta', 'cuenta_eliminar')->name('usuario.cuenta.eliminar');
    Route::post('/report', 'reporte')->name('reportar.mensaje');
});

Route::middleware(['\App\Http\Middleware\PasarTipoAVistaMiddleware', 'auth'])->controller('\App\Http\Controllers\ArchivoController')->group(function () {
    Route::get('/subir', 'archivo_mostrar')->name('archivo.subir.mostrar');
    Route::post('/subir', 'archivo_guardar')->name('archivo.subir.guardar');
    Route::put('/subir', 'archivo_modificar')->name('archivo.subir.modificar');
    Route::delete('/subir', 'archivo_eliminar')->name('archivo.subir.modificar');
    Route::get('/ver', 'archivo_abrir')->name('archivo.ver.abrir');
    Route::post('/ver', 'archivo_ver')->name('archivo.ver.guardar');

    Route::post('/home/delete/{tipo}', 'borrarArchivo')->name('archivo.home.borrar');
    // Route::get('/home/delete/{tipo}', 'borrarArchivo')->name('archivo.home.borrar');
    Route::get('/home/info/{tipo}/{id}', 'obtenerInfo')->name('archivo.home.obtenerInfo');
    Route::get('/home/{tipo}', 'mostrar_por_tipo')->name('archivo.home.mostrar_por_tipo');
    Route::get('/home/{tipo}/{accion}', 'mostrar_form_datos_tipo')->whereIn('accion', ['Crear', 'Create'])->name('archivo.home.mostrar_form_datos_tipo');
    Route::post('/home/{tipo}/{accion}', 'crear_datos_tipo')->whereIn('accion', ['Crear', 'Create'])->name('archivo.home.crear_datos_tipo');
    Route::get('/home/Software/{path}', 'descargar_archivo')->where('path', '.*')->name('archivo.home.software.descargar');
    Route::get('/home/Otros/{path}', 'descargar_archivo')->where('path', '.*')->name('archivo.home.otros.descargar');
    Route::get('/home/{tipo}/{nombre}', 'mostrar_por_tipo_y_nombre')->name('archivo.home.mostrar_por_tipo_y_nombre');
});
