<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class catequeseController extends Controller
{
    public function index(){
        return view('components/catequese/cons-catequese');
    }
}
