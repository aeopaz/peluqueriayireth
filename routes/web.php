<?php

use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TurnoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/user', UserController::class);

Route::get('/mensaje',[MensajeController::class,'index'])->name('mensaje.index');
Route::get('/servicio',[ServicioController::class,'index'])->name('servicio.index');
Route::get('/historial_turnos',[TurnoController::class,'index'])->name('historial_turnos.index');


