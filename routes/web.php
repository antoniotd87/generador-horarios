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

/* Route::get('/', function () {
    return redirect('/home');
}); */

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@inicio');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('maestros', 'MaestroController');
    Route::resource('semestres', 'SemestreController');
    Route::resource('aulas', 'AulaController');
    Route::resource('materias', 'MateriaController');
    Route::resource('horas', 'HoraController');
    Route::resource('dias', 'DiaController');
    Route::resource('horario-disponibles', 'HorarioDisponibleController');
    Route::resource('grupos', 'GrupoController');
    Route::resource('materia-grupos', 'MateriaGrupoController');
    Route::resource('clases', 'ClaseController')->except(['create', 'edit']);
    Route::get('clases/create/{maestro}', 'ClaseController@create')->name('clases.create');
    Route::get('clases/{clase}/create/{maestro}', 'ClaseController@edit')->name('clases.edit');

    Route::get('/generador', 'HomeController@generador')->name('horario.generador');
    Route::get('/horarioGrupo/{grupo}', 'HomeController@horarioGrupo')->name('horario.grupo');
    Route::get('/descargarHorarioGrupo/{grupo}', 'HomeController@descargarHorarioGrupo')->name('descargar.horario.grupo');
    Route::get('/horarioMaestro/{maestro}', 'HomeController@horarioMaestro')->name('horario.maestro');
});
