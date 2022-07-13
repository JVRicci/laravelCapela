<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\doadores;
use App\Models\doacoes;

class doacoesController extends Controller
{
    
    public function search(){

        $doadores = DB::table('doadores')->get();
        $doacoes = DB::table('doacoes')->get();
        return view('\components\doacoes\doacoes', ['doadores'=> $doadores], ['doacoes'=>$doacoes]);
    }

    public function store_doacao(request $request){
        $doacao = doacoes::create([
            //['idDoador','descricao', 'destino', 'dataRecebimento', 'tipoDoacao'];
            'idDoador'=> $request->doadorIdTxt,
            'descricao'=>$request->descricaoTxt,
            'destino'=>$request->destinoTxt,
            'dataRecebimento'=>$request->recebimentoDate,
            'tipoDoacao'=>$request->tipoSel,
        ]);
        return back();
    }

    public function store_doador(request $request){
        doadores::create([
            'nome'=>$request->doadorTxt,
        ]);

        return back();
    }
}
