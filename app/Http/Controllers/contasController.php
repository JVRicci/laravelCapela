<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\contas;
use App\Models\User;
use Illuminate\Http\Request;

class contasController extends Controller
{
    public function search(){
        $search = request('estado');

        $responsavel = User::all();
        
        if($search){
            $contas = contas::where('estado','like','%'.$search.'%')->get();
        }else if($search==""){

            $contas = contas::all();
        }
        
        return view('components/contas/contas', ['contas'=>$contas], ['responsavel'=>$responsavel]);
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
            'responsavel'=>$request->responsavelCombo,//$request->responsavelCombo,
            'pagamento'=>$request->pagamentoDate,
            'formaPagamento'=>$request->pagamentoCombo,
            'estado'=>$request->estadoCombo
        ]);
        return back();
    }
}
