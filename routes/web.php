<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TurnoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Models\Local;
use App\Models\User;


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
//Ruta inicial, cuando el usuario no esta logueado
Route::get('/', function () {
    // return view('inicio.index');
    $estado_local = Local::orderBy('created_at', 'desc')->first();//Obtiene el estado del local, si esta abierto, cerrado o ausente
    if (isset($estado_local->estado)) {
        $estado = $estado_local->estado;
    } else {
        $estado = null;
    }
    return view('inicio.index', compact('estado'));
})->middleware('checklogout');//Evita que el usuario vaya a esta ruta si ya inició sesión

Auth::routes();

Route::group(['middleware' => ['checklogin']], function () {//Valida que el usuario inicie sesión

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//Ruta donde se solicita los turnos y para los usuarios autorizados, donde gestiona los turnos
    Route::get('/historial_turnos', [TurnoController::class, 'index'])->name('historial_turnos.index');//Ruta para ver el historial de los turnos de un usuario

    //Ruta para ver el perfil del usuario
    Route::get('/profile', function(){
        $usuario=User::find(Auth::user()->id);
        $imagen='https://picsum.photos/300/300';
        return view('user.profile',compact('usuario','imagen'));
    });

    Route::get('/change_password', function(){
        return view('user.change_password');

    });
    Route::post('/saved_password',[UserController::class,'save_password'])->name('save_password');

    //Rutas para los administradores o peluqueros
    Route::get('/mensaje', [MensajeController::class, 'index'])->name('mensaje.index')->middleware('checkautorizacion:admin,peluquero');//Ruta para parametrizar los mensajes que aparecen en el home
    Route::get('/servicio', [ServicioController::class, 'index'])->name('servicio.index')->middleware('checkautorizacion:admin,peluquero');//Ruta para parametrizar los servicios
    Route::resource('/user', UserController::class)->middleware('checkautorizacion:admin,peluquero');//Ruta para la gestión de usuarios
    Route::get('/estado_local/{tipo_estado}', [LocalController::class, 'estado_local'])->name('estado_local')->middleware('checkautorizacion:admin,peluquero');//Ruta para abrir, cerrar o ausentar el local
    //Ruta que muestra la vista de error si se intenta acceder a una ruta no autorizada para el usuario
    Route::get('/error', function(){
        return view('errors.error');
    });

});
