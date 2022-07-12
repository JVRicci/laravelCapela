<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\dizimista;
use App\Models\contato;
use App\Models\endereco;
use App\Models\dizimo;

class dizimoController extends Controller
{
    public function cadastrar(){

        return view("\components\dizimo\cad-dizimista");
    
    }

    public function search_dizimista(request $request){
        
        $id = request('id');

        $dizimista = DB::table("dizimistas")
        ->join('enderecos','enderecos.id', '=', 'dizimistas.idEndereco')
        ->join('contatos', 'contatos.id', '=', 'dizimistas.idContato')
        ->select('dizimistas.id as id', 'dizimistas.nome as nomed', 'dizimistas.cpf as cpf','dizimistas.nascimento as nascimento',
        'dizimistas.estadoCivil as estadoCivil', 'dizimistas.tipoCasamento as tipoCasamento', 'dizimistas.conjuge as conjuge',
        'dizimistas.conjugeNascimento as conjugeNascimento','dizimistas.ativo as ativo',
        'contatos.telefone as telefone', 'contatos.celular as celular',
        'enderecos.endereco as endereco', 'enderecos.cep as cep', 'enderecos.numero as numero', 'enderecos.cidade as cidade',
        'enderecos.bairro as bairro', 'enderecos.uf as uf')->get()
        ->where('id',$id);

        $dizimos = DB::table("dizimos")->get()->where('idDizimista',$id);

        return view ('components\dizimo\cons-dizimos', ['dizimista'=>$dizimista ], ['dizimos'=>$dizimos]);
    }

    public function search(){

        $dizimista = DB::table('dizimistas')
        ->join('enderecos','enderecos.id','=','dizimistas.idEndereco')
        ->join('contatos', 'contatos.id','=','dizimistas.idContato')
        ->select('dizimistas.id as id', 'dizimistas.nome as nome',
        'enderecos.endereco as endereco',
        'contatos.telefone as telefone',
        'contatos.celular as celular')->get();

        return view('components\dizimo\cons-dizimista', ['dizimista'=>$dizimista] );
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
            'tipoCasamento'=> $request->tipoCasamento,
            'conjuge' => $request->conjugeTxt,
            'conjugeNascimento' => $request->conjugeDate,
            'ativo'=>'Ativo'
        ]);

        return redirect('/cons-dizimista' );
    }

    public function store_dizimos(request $request){

        dizimo::create([
            'idDizimista'=>$request->id,
            'qtdRecebida'=>$request->qtdRecebida,
            'dataRecebimento'=>$request->dataRecebimento,
        ]);
        return redirect ('/cons-dizimos');

    }

    
}
