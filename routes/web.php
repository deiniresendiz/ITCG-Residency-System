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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/cursos','CursosController');
Route::resource('/trabajos','BolsaTrabajoController');
Route::resource('/egresados','EgresadosController');
Route::resource('/empresas','EmpresasController');
Route::get('empresas/towns/{id}','EmpresasController@getTowns');
Route::get('egresados/towns/{id}','EgresadosController@getTowns');
Route::get('trabajos/towns/{id}','BolsaTrabajoController@getTowns');

