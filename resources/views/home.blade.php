@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex mb-3">
        <h3>Lista de veículos</h3>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="card-body mb-3">
            <form method="GET" action="{{ route('home') }}">
                <div class="row g-3">
                    <div class="form-group col-2 mr-2">
                        <label for="name" class="mb-0">Nome</label>
                        <input 
                        type="text"
                        class="form-control form-control-sm"
                        id="name"
                        name="filter[name]"
                        placeholder="Ex: Uno"
                        autocomplete="off"
                        value="{{ request()->filter['name'] ?? ''}}"
                        >
                    </div>
                    <div class="form-group col-2 mr-2">
                        <label for="brand" class="mb-0">Marca</label>
                        <input 
                        type="text"
                        class="form-control form-control-sm"
                        id="brand"
                        name="filter[brand]"
                        placeholder="Ex: Fiat"
                        autocomplete="off"
                        value="{{ request()->filter['brand'] ?? ''}}"
                        >
                    </div>
                    <div class="form-group col-2 mr-2">
                        <label for="city" class="mb-0">Cidade</label>
                        <input 
                        type="text"
                        class="form-control form-control-sm"
                        id="city"
                        name="filter[city]"
                        placeholder="Ex: Salvador"
                        autocomplete="off"
                        value="{{ request()->filter['city'] ?? ''}}"
                        >
                    </div>
                    <div class="form-group col-4 d-flex align-items-end">
                        <a class="btn btn-secondary btn-sm" href="{{ route('home') }}" style="margin-right: 10px">Limpar</a>
                        <button class="btn btn-secondary btn-sm" style="margin-right: 10px">Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(session('message')) 
        <div class="alert alert-success w-100">
            {{session('message')}}
        </div>
    @endif
    <div class="row justify-content-center">
       <div class="col-9">
            @forelse ($items as $item)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                       <img class="img-fluid rounded-start" src="{{ asset('assets/images/' . $item->image) }}" alt="img" width="180px" height="200px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{$item->name}}</h5>
                            <p class="card-text text-secondary mb-2">{{$item->description}}</p>
                            <h5>{{$item->price}}</h5>
                            <div class="actions">
                                <a href="{{route('veiculo.edit',$item->id)}}" class="btn btn-primary">Editar</a>
                                <button class="btn btn-primary">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            @empty
            <div class="card text-center p-3 d-flex align-items-center">
                <img src="{{asset('assets/images/encontrar.png')}}" alt="empty-state" width="300">
                <h4>Nenhum veículo encontrado</h4>
            </div>
            @endforelse
       </div>
    </div>
</div>
@endsection
