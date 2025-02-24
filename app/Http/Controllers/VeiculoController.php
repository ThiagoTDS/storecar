<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class VeiculoController extends Controller
{

    public function listaVeiculos ():View
    {
        return view('index');
    }
}
