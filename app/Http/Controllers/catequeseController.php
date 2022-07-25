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

    public function cons_turma(){
        $id = request('id');

        $turma = DB::table('turmas')
        ->join('catequistas', 'catequistas.id','=','turmas.idCatequista')
        ->select('turmas.diaEncontro as diaEncontro','turmas.formacao as formacao',
        'catequistas.nome as nome', 'catequistas.ativo as ativo')
        ->where('turmas.id','=',$id)->get();

        $catequizandos = DB::table('catequizandos')
        ->select('catequizandos.id as id','catequizandos.nome as nome','catequizandos.ativo as ativo',
        'catequizandos.faltaEncontro as faltaEncontro','catequizandos.faltaMissa as faltaMissa')
        ->where('idTurma','=',$id)
        ->get();
        
        
        $catSemSala = DB::table('catequizandos')->
        select('catequizandos.id as id','catequizandos.nome as nome')->where('idTurma','!=',$id)->get();

        return view('components/catequese/cons-sala', ['turma'=>$turma, 'catequizandos'=>$catequizandos, 'catSemSala'=>$catSemSala]);
        //return ($turma);
    }

    public function cad_catequizando_turma(request $request) {
        $id = request('id');
        
        catequizandos::where('id',$request->catequizandoTxt)->
        update(['idTurma'=>$request->idTxt]);
        
        return back();
    }

    public function cons_catequizando(){
        $id = request('id');

        $catequizando = DB::table('catequizandos')->
        join('responsavels','responsavels.id','=','catequizandos.idResponsavel')->
        join('enderecos','enderecos.id', '=','catequizandos.idEndereco')->
        join('contatos','contatos.id','=','catequizandos.idContato')->
        select('catequizandos.nome as nomec', 'catequizandos.nascimento as nascimentoc', 'catequizandos.faltas as faltas',
        'catequizandos.ativo as ativo', 'catequizandos.turma as turma',
        'responsavels.responsavel as nomer', 'responsavels.nascResponsavel as nascimentor', 'responsavels.tipoCasamento as casamento',
        'responsavels.padrinho as padrinho', 'responsavels.madrinha as madrinha',
        'contatos.telefone as telefone', 'contatos.celular as celular', 'contatos.email as email',
        'enderecos.endereco as endereco', 'enderecos.cep as cep', 'enderecos.numero as numero', 'enderecos.cidade as cidade',
        'enderecos.bairro as bairro', 'enderecos.uf as uf')->
        where('catequizandos.id',$id)->get();

        
        return view('components/catequese/cons-catequizando',['catequizando'=>$catequizando]);
        //return ($catequizando);
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
            'turma'=>0,
            'faltaEncontro'=>null,
            'faltaMissa'=>null
            
        ]);

        return back();
    }
}
