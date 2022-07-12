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
    return view('main');
});

Route::get('/cad-dizimista','dizimoController@cadastrar');

Route::POST('/cons-dizimista', 'dizimoController@store')->name('registrar-dizimista');

Route::get('/cons-dizimista','dizimoController@search');