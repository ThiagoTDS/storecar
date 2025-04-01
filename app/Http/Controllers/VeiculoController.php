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

    public function listaVeiculos(): View
    {
        return view('index');
    }

    public function create(): View
    {
        return view('form');
    }

    public function index(): View
    {
        $perPage = 10;
        $items = $this->veiculoRepository->paginate($perPage);
        return view('home', compact('items'));
    }

    public function store(VeiculoRequest $request)
    {

        $data = $request->validated();

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/assets/images'), $filename);
            $data['image'] = $filename;
        }

        $insert = $this->veiculoRepository->store($data);
        if (!$insert) {
            return redirect()->back()->with('error', 'Erro ao cadastrar veículo');
        }

        return redirect()->route('home')->with('message', 'Veículo cadastrado com sucesso');
    }

    public function edit($id)
    {
        $item = $this->veiculoRepository->findById($id);

        return view('form', compact('item'));
    }

    public function update(VeiculoRequest $request, int $id)
    {
        try 
        {
            $data = $request->validated();

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('/assets/images'), $filename);
                $data['image'] = $filename;
            }

            $insert = $this->veiculoRepository->update($id, $data);
            
            if (!$insert) {
                return redirect()->back()->with('error', 'Erro ao atualizar veículo');
            }

            return redirect()->route('home')->with('message', 'Veículo atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()
            ->with('error', 'Erro: ' . $e->getMessage());
        }
    }
}