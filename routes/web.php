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

use Barryvdh\DomPDF\PDF;

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
Route::resource('/carreras','CarrerasController');
Route::resource('/admin','AdministradoresController');
Route::resource('/account','MyCountAdminController');
Route::resource('/ocupaciones','OcupacionesController');
Route::resource('/estudios','EstudiosController');
Route::get('admin/{id}/pass/{pass}','AdministradoresController@updatePass');
Route::get('admin/{id}/destroy','AdministradoresController@destroy');
Route::get('empresas/towns/{id}','EmpresasController@getTowns');
Route::get('empresas/{em}/townsedit/{id}','EmpresasController@getTownsEdit');
Route::get('egresados/towns/{id}','EgresadosController@getTowns');
Route::get('egresados/{eg}/townsedit/{id}','EgresadosController@getTownsEdit');
Route::get('trabajos/towns/{id}','BolsaTrabajoController@getTowns');
Route::get('trabajos/{ta}/townsedit/{id}','BolsaTrabajoController@getTownsEdit');

Route::get('pdf/egresados','EgresadosController@pdfegresados')->name('egresados.pdf');
Route::get('pdf/{id}/egresado','EgresadosController@pdf')->name('egresado.pdf');

Route::post('change-password', 'MyCountAdminController@updatePass')->name('password.update');


Route::resource('/adminegresado','AdmiEgresadosController');
Route::get('adminegresado/{id}/pass/{pass}','AdmiEgresadosController@updatePass');

Route::get('pdf/', function () {
    $pdf = resolve('dompdf.wrapper');
    $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    $pdf->loadView('pdf.egresados');
    return $pdf->stream();

});



