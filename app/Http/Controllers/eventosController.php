<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\eventos;

class eventosController extends Controller
{
    public function index(){

        $eventos = DB::table('eventos')
        ->join('users','users.id','=','eventos.idResponsavel')
        ->select('eventos.nome as nomeEvt', 'eventos.data as data',
        'users.name as responsavel')
        ->get();
        $users = DB::table('users')->
        select('id','name')->get();
        return view ('components/eventos/cons-eventos', ['eventos'=> $eventos, 'users'=> $users]);
    }

    public function cad_eventos(request $request){
        
        eventos::create([
            'idResponsavel'=> $request->responsavelCombo,
            'nome'=> $request->nomeTxt,
            'data'=> $request-> dataDate,
            'descricao'=>$request->descricaoTxt
        ]);
        return back();
    }
}
