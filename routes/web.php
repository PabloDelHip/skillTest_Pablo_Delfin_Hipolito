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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'login'], function () {
    Route::get('/', ['as' => '/', 'uses' => 'FuncionesController@index']);
    Route::get('home', ['as' => 'home', 'uses' => 'FuncionesController@index']);
    Route::get('crear', ['as' => 'crear', 'uses' => 'FuncionesController@crear']);
    Route::get('seleccionar', ['as' => 'seleccionar', 'uses' => 'FuncionesController@seleccionar']);

    //FUNCIONES
    Route::post('crear-funcion', ['as' => 'crear-funcion', 'uses' => 'FuncionesController@crear_funcion']);

    //AJAX
    Route::get('info-funciones/{id?}', ['as' => 'info-funciones', 'uses' => 'FuncionesController@infoFunciones']);
    Route::get('info-asientos/{id?}', ['as' => 'info-asientos', 'uses' => 'FuncionesController@infoAsientos']);
    Route::post('guardar-asistencia', ['as' => 'guardar-asistencia', 'uses' => 'FuncionesController@guardarAsistencia']);
    Route::get('guardar-asistencia', ['as' => 'guardar-asistencia', 'uses' => 'FuncionesController@guardarAsistencia']);
});




