<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\doadores;

class doacoesController extends Controller
{
    
    public function search(){

        $doadores = DB::table('doadores')->get();
        return view('\components\doacoes\doacoes', ['doadores'=> $doadores]);
    }

    public function store_doador(request $request){
        doadores::create([
            'nome'=>$request->doadorTxt,
        ]);

        return back();
    }
}
