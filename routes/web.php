<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    //MODULO USUARIOS
    Route::resource('permisos', 'PermisoController');
    Route::resource('roles', 'RolesController');
    Route::resource('usuarios', 'UsersController');

    //MODULO TRAMITE
    Route::resource('carrera', 'CarreraController');
    Route::resource('estudiante', 'EstudianteController');
    Route::resource('tramite', 'TramiteController');
});
