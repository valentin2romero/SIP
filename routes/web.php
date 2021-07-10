<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes(['register' => true]);
Route::get('/', 'HomeController@index')->name('home');
Route::get('/herramienta', 'HomeController@herramienta')->name('home.herramienta');

Route::get('/sentencia', 'SentenciasController@index')->name('sentencia.index');
Route::get('/sentencia/create', 'SentenciasController@create')->name('sentencia.create');
Route::get('/sentencia/{id}/show', 'SentenciasController@show')->name('sentencia.show');
Route::get('/sentencia/{id}/edit', 'SentenciasController@edit')->name('sentencia.edit');
Route::get('/sentencia/{id}/download', 'SentenciasController@download')->name('sentencia.download');
Route::delete('/sentencia/{id}', 'SentenciasController@destroy')->name('sentencia.destroy');

Route::get('/herramienta/texto-sentencia', 'TextoSentenciasController@index')->name('texto-sentencia.index');
Route::get('/herramienta/texto-sentencia/create', 'TextoSentenciasController@create')->name('texto-sentencia.create');
Route::post('/herramienta/texto-sentencia', 'TextoSentenciasController@store')->name('texto-sentencia.store');
Route::get('/herramienta/texto-sentencia/{id}/show', 'TextoSentenciasController@show')->name('texto-sentencia.show');
Route::get('/herramienta/texto-sentencia/{id}/edit', 'TextoSentenciasController@edit')->name('texto-sentencia.edit');
Route::put('/herramienta/texto-sentencia/{id}', 'TextoSentenciasController@update')->name('texto-sentencia.update');
Route::delete('/herramienta/texto-sentencia/{id}', 'TextoSentenciasController@destroy')->name('texto-sentencia.destroy');