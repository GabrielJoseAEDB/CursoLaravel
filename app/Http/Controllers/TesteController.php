<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index(){
        $teste = ['teste',2];
        return $teste;
    }
}
