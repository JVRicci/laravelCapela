<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\doadores;
use App\Models\doacoes;
use DateTime;

class doacoesController extends Controller
{
    
    public function search(){
        $search = request('pesquisaTxt');

        if($search){

            $doadores = doadores::where('nome','like','%'.$search.'%')->get();
            $doacoes = doacoes::get();
            
        }else{
            
            $doadores = doadores::all();
            $doacoes = doacoes::get();
        
        }

        return view('\components\doacoes\doacoes', ['doadores'=> $doadores], ['doacoes'=>$doacoes]);
    }

    public function store_doacao(request $request){
        $doacao = doacoes::create([
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

    public function delete_doacao(){

        $doacao = request('idDoacao');
        doacoes::where('id','=',$doacao)->delete();
        return back();

    }

    public function update_doacao(request $request){

        $doacao = request('idDoacaoAlter');

        $dataReceb = $request->alterRecebimentoDate;
         
         doacoes::where('id','=',$doacao)->update([
            'descricao'=>$request->alterDescricaoTxt,
            'destino'=>$request->alterDestinoTxt,
            'dataRecebimento'=>$dataReceb,
            'tipoDoacao'=>$request->alterTipoSel,
        ]);
        
        return back();
    }
}
