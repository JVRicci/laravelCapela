<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('main');
});

Route::get('/cad-dizimista','dizimoController@cadastrar');

Route::POST('/cons-dizimista', 'dizimoController@store')->name('registrar-dizimista');
Route::POST('/cons-dizimos','dizimosController@store_dizimos')->name('registrar-dizimos');

Route::get('/cons-dizimista','dizimoController@search');
Route::get('/cons-dizimos/id={id}','dizimoController@search_dizimista');