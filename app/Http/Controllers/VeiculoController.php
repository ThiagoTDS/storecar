<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use Illuminate\Contracts\View\View;

class VeiculoController extends Controller
{

    public function listaVeiculos ():View
    {
        return view('index');
    }


    
    public function create ():View
    {
        return view('form');
    }

    public function store(VeiculoRequest $request){
       $data = $request->validated();
        dd('aqui', $data);
    }


    
}