<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PerfilProfesionalController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\ConvocatoriaController;


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
    return view('welcome');
});

/*Route::get('/personal', function () {
    return view('personal.index');
});
Route::get('/personal/create',[PersonalController::class,'create']);
*/
Route::resource('/personal',PersonalController::class);

Route::resource('/perfil',PerfilProfesionalController::class);

Route::resource('/direccion',DireccionController::class);

Route::resource('/convocatoria',ConvocatoriaController::class);