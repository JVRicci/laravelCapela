<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dizimosController;
use App\Http\Controllers\doacoesController;
use App\Http\Controllers\contasController;


Route::get('/', function () {
    return view('main');
});

Route::get('/cad-dizimista','dizimoController@index');
Route::get('/doacoes','doacoesController@search');

Route::POST('/cons-dizimista', 'dizimoController@store')->name('registrar-dizimista');
Route::POST('/cons-dizimos','dizimoController@store_dizimos')->name('registrar-dizimos');
Route::POST('/cad-doador', 'doacoesController@store_doador')->name('registrar-doador');
Route::POST('/cad-doacao','doacoesController@store_doacao')->name('registrar-doacao');
Route::POST('/cad-conta', 'contasController@store_conta')->name('registrar-conta');

Route::get('/cons-dizimista','dizimoController@search');
Route::get('/cons-dizimos/id={id}','dizimoController@search_dizimista');
Route::get('/cons-contas', 'contasController@search');