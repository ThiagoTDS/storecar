<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Repositories\VeiculoRepository;
use Illuminate\Contracts\View\View;

class VeiculoController extends Controller
{
    public $veiculoRepository;
    
    public function __construct(VeiculoRepository $veiculoRepository)
    {
        $this->veiculoRepository = $veiculoRepository;
    }    

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
    
        $insert = $this->veiculoRepository->store($data);
        
        if($request->file('image'))
        {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/images'), $filename);
            $data ['image'] = $filename;
        }
        
        if(!$insert){
           return redirect()->back()->with('error', 'Erro ao cadastrar veículo'); 
        }
        
        return redirect()->route('home')->with('message','Veículo cadastrado com sucesso');
    }


    
}