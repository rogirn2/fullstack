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

require 'auth/user.php';
require 'auth/admin.php';

Auth::routes();


Route::get('criar','GaleryController@create');
Route::post('criar', 'GaleryController@store');
Route::get('index', 'GaleryController@index');
Route::get('deletar/{id}','GaleryController@destroy');

//Route::get('/', ['uses' => 'ClienteController@index']);
Route::get('/', ['uses' => 'GaleryController@fazerLogin']);
Route::resource('cliente', 'ClienteController');
Route::post('/cliente/login', ['as' => 'cliente.login', 'uses' => 'GaleryController@index']);
/*Route::get('/login', ['uses' => 'Controller@fazerLogin']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'Controller@login']);




Route::get('/home', 'HomeController@index')->name('home');*/
