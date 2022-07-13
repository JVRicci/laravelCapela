<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dizimosController;
use App\Http\Controllers\doacoesController;


Route::get('/', function () {
    return view('main');
});

Route::get('/cad-dizimista','dizimoController@cadastrar');
Route::get('/doacoes','doacoesController@search');

Route::POST('/cons-dizimista', 'dizimoController@store')->name('registrar-dizimista');
Route::POST('/cons-dizimos','dizimoController@store_dizimos')->name('registrar-dizimos');
Route::POST('/cad-doador', 'doacoesController@store_doador')->name('registrar-doador');

Route::get('/cons-dizimista','dizimoController@search');
Route::get('/cons-dizimos/id={id}','dizimoController@search_dizimista');