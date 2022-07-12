<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\dizimista;
use App\Models\contato;
use App\Models\endereco;

class dizimoController extends Controller
{
    public function cadastrar(){

        return view("\components\dizimo\cad-dizimista");
    
    }

    public function store(request $request){

        $end = endereco::create([
            'endereco'=>$request->enderecoTxt,
            'cep' => $request->cepTxt,
            'numero'=>$request->numeroTxt,
            'cidade'=>$request->cidadeTxt,
            'bairro'=>$request->bairroTxt,
            'uf' =>$request->ufTxt,
        ]);

        $cont = contato::create([
            'telefone' => $request->telefoneTxt,
            'celular' => $request->celularTxt,
            'email' => $request->emailTxt,
        ]);
        

        dizimista::create([
            'idContato' => $end->id,
            'idEndereco' =>$cont->id,
            'nome'=>$request->nomeTxt,
            'nascimento'=>$request->nascimentoDate,
            'cpf'=>$request->cpfTxt,
            'estadoCivil'=>$request->estadoCivil,
        ]);

        return redirect('/cons-dizimista' );
    }

    public function search(){

        $dizimista = DB::table('dizimista')
        ->join('endereco','endereco.id','=','dizimista.idEndereco')
        ->join('contato', 'contato.id','=','dizimista.idContato')
        ->select('dizimista.id as id', 'dizimista.nome as nome',
        'endereco.endereco as endereco',
        'contato.celular as celular')->get();

        return view('components\dizimo\cons-dizimista', ['dizimista'=>$dizimista] );
    }
}
