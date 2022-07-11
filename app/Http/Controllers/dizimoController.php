<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dizimoController extends Controller
{
    public function create(){

        return view("\components\dizimo\cad-dizimista");
    
    }
}
