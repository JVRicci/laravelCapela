<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\catequizandos;
use App\Models\catequistas;
use App\Models\turmas;
use App\Models\endereco;
use App\Models\contato;
use App\Models\responsavel;

class catequeseController extends Controller
{
    public function index(){

        $catequizandos = DB::table('catequizandos')
        ->join('responsavels', 'responsavels.id','=','catequizandos.idResponsavel')
        ->select('catequizandos.id as id','catequizandos.nome as nome', 'responsavels.responsavel as responsavel')
        ->get();

        $turmas = DB::table('turmas')
        ->join('catequistas', 'catequistas.id','=','turmas.idCatequista')
        ->select('turmas.id as id','turmas.diaEncontro as diaEncontro', 'turmas.formacao as formacao',
        'catequistas.nome as nome')->get();
        $catequistas = DB::table('catequistas')->get();

        return view('components/catequese/cons-catequese', ['catequizandos'=>$catequizandos, 'catequistas'=>$catequistas, 'turmas'=>$turmas],);
    }

    public function cad_turma(request $request){

        turmas::create([
            'idCatequista'=>$request->catequistaCombo,
            'diaEncontro'=>$request->diaEncontroCombo,
            'formacao'=>$request->formacaoCombo,
        ]);
        return back();
    }

    public function cad_catequista(request $request){
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
        catequistas::create([
            'idContato' => $cont->id,
            'idEndereco' => $end->id,
            'idTurma'=>0,
            'nome'=>$request->nomeTxt,
            'nascimento' => $request->nascimentoTxt,
            'ativo'=> 'Ativo',
            
        ]);

        return back();

    }

    public function cad_catequizando(request $request){
        
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

        $respons = responsavel::create([
            'responsavel' => $request->responsavelTxt,
            'nascResponsavel'=>$request->nascimentoResponTxt,
            'estadoCivil'=>$request->tipoCasamentoCombo,
            'tipoCasamento'=>$request->tipoCasamentoCombo,
            'padrinho'=>$request->padrinhoTxt, 
            'madrinha'=>$request->madrinhaTxt
        ]);

        //protected $fillable = ['idContato', 'idEndereco', 'idResponsavel', 'idTurma','nome','nascimento',
        //'faltas', 'ativo', 'turma','faltaEncontro', 'faltaMissa'];

        //protected $fillable =['responsavel', 'nascResponsavel', 'estadoCivil', 'tipoCasamento', 'padrinho', 'madrinha'];
        catequizandos::create([
            'idContato' => $cont->id,
            'idEndereco' => $end->id,
            'idResponsavel' => $respons->id,
            'idTurma'=>1,
            'nome'=>$request->nomeTxt,
            'nascimento' => $request->nascimentoTxt,
            'faltas'=>null,
            'ativo'=> 'Ativo',
            'turma'=>1,
            'faltaEncontro'=>null,
            'faltaMissa'=>null
            
        ]);

        return back();
    }
}
