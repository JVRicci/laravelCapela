<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dizimosController;
use App\Http\Controllers\doacoesController;
use App\Http\Controllers\contasController;


Route::get('/', function () {  return redirect('/login');});
//Route::POST('/login', function () { return view('main');});


Route::get('/cad-dizimista','dizimoController@index');
Route::get('/doacoes','doacoesController@search');
Route::get('/cons-catequese','catequeseController@index');
Route::get('/cons-eventos','eventosController@index');
Route::get('/cons-turma/id={id}','catequeseController@cons_turma');
Route::get('/cons-catequizando/id={id}','catequeseController@cons_catequizando');

Route::GET('/atualiza-dizimista/id={id}','dizimoController@atualiza_dizimista');
 
Route::GET('/register', function(){
    return view('auth/register');
});


Route::POST('/cons-dizimista', 'dizimoController@store')->name('registrar-dizimista');
Route::POST('/cons-dizimos','dizimoController@store_dizimos')->name('registrar-dizimos');
Route::POST('/cad-doador', 'doacoesController@store_doador')->name('registrar-doador');
Route::POST('/cad-doacao','doacoesController@store_doacao')->name('registrar-doacao');
Route::POST('/cad-conta', 'contasController@store_conta')->name('registrar-conta');
Route::post('/cad-catequisando','catequeseController@cad_catequizando')->name('registrar-catequizando');
Route::post('/cad-catequista','catequeseController@cad_catequista')->name('registrar-catequista');
Route::post('/cad-turmas','catequeseController@cad_turma')->name('registrar-turma');
Route::POST('/cad-eventos', 'eventosController@cad_eventos')->name('registrar-eventos');
Route::POST('/cad-cat-turma','catequeseController@cad_catequizando_turma')->name('registrar-cat-turma');

Route::get('/cons-dizimista','dizimoController@search');
Route::get('/cons-dizimos/id={id}','dizimoController@search_dizimista');
Route::get('/cons-contas', 'contasController@search');

Route::POST('/delete-dizimo','dizimoController@delete_dizimo');
Route::POST('/delete-doacao','doacoesController@delete_doacao');

Route::POST('/atualiza-doacao','doacoesController@update_doacao');
Route::POST('/alterar-dizimista/id={id}','dizimoController@update_dizimista');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('main');
    })->name('dashboard');
});
