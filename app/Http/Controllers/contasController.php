<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\contas;
use Illuminate\Http\Request;

class contasController extends Controller
{
    public function search(){
        $search = request('pesquisaTxt');

        
            $contas = contas::all();
        
        return view('components/contas/contas', ['contas'=>$contas]);
    }

    public function store_conta(request $request){
        //['descricao', 'valor','categoria','fornecedor','vencimento','responsavel',
        //'pagamento','formaPagamento','estado'];
        contas::create([
            'descricao'=>$request->descricaoTxt,
            'valor'=>$request->valorTxt,
            'categoria'=>$request->categoriaCombo,
            'fornecedor'=>$request->fonecedorTxt,
            'vencimento'=>$request->vencimentoDate,
            'responsavel'=>'USER',//$request->responsavelCombo,
            'pagamento'=>$request->pagamentoDate,
            'formaPagamento'=>$request->pagamentoCombo,
            'estado'=>$request->estadoCombo
        ]);
        return back();
    }
}
