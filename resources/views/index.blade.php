@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h4>Filtros</h4>
                </div>
                <hr>
                <form method="GET" action="{{route('veiculos.list')}}">
                    <div class="mb-3 mx-3">
                        <label class="form-label" for="brand">Marca</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="brand" 
                        name="filter[brand]" 
                        autocomplete="off" 
                        value="{{request()->filter['brand'] ?? ''}}">
                    </div>
                    <div class="mb-3 mx-3">
                        <label for="veiculo_ano" class="form-label">Ano do veículo</label>
                        <input 
                        type="range" 
                        class="form-control-range w-100" 
                        id="veiculo_ano" 
                        name="filter[veiculo_ano]" 
                        step="1"
                        min="1910"
                        max="2025"
                        value="{{request()->filter['veiculo_ano'] ?? '2023'}}"
                        oninput="document.getElementById('yearsrange').innerText = document.getElementById('veiculo_ano').value"
                        ><br>
                        Até <span id="yearsrange"> {{request()->filter['veiculo_ano'] ?? '2025'}} </span>
                    </div>
                    <div class="mb-3 mx-3">
                        <label for="kilometers" class="form-label">KM</label>
                        <input 
                        type="range" 
                        class="form-control-range w-100" 
                        id="kilometers" 
                        name="filter[kilometers]" 
                        step="1000"
                        min="10000"
                        max="200000"
                        value="{{request()->filter['kilometers'] ?? '200000'}}"
                        oninput="document.getElementById('kilometersrange').innerText = document.getElementById('kilometers').value"
                        ><br>
                        Até <span id="kilometersrange"> {{request()->filter['kilometers'] ?? '200000'}} </span>
                    </div>
                    <div class="mb-3 mx-3">
                        <label for="price" class="form-label">Preço</label>
                        <input 
                        type="range" 
                        class="form-control-range w-100" 
                        id="price" 
                        name="filter[price]" 
                        step="1000"
                        min="10000"
                        max="200000"
                        value="{{request()->filter['price'] ?? '200000'}}"
                        oninput="document.getElementById('pricerange').innerText = document.getElementById('price').value"
                        ><br>
                        Até <span id="pricerange"> {{request()->filter['price'] ?? '200000'}} </span>
                    </div>
                    <div class="mb-3 mx-3">
                        <label class="form-label" for="type">Tipo de veículo</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        id="city" 
                        name="filter[city]" 
                        autocomplete="off" 
                        value="{{request()->filter['city'] ?? ''}}">
                    </div>
                    <div class="mb-3 mx-3">
                        <label class="form-label" for="city">Cidade</label>
                        <select class="form-select" name="filter[type]" id="type">
                            <option value="">Selecione uma opção</option>
                            <option value=""
                            @if(isset(request()->filter['type']) && request()->filter['type'] == "Novo") selected @endif
                            >Novo</option>
                            <option value=""
                            @if(isset(request()->filter['type']) && request()->filter['type'] == "Usado") selected @endif
                            >Usado</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 mx-3">
                        <button class="btn btn-primary mb-3" type="submit">Filtrar</button>
                        <a href="{{route('veiculos.list')}}" class="btn btn-outline-secondary mb-3">Limpar filtros</a>
                    </div>
                </form>
            </div>   
        </div>
        <div class="col-9">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse($items as $item)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{asset('assets/images/'.$item->image)}}" class="card-img-top" alt="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title mb-2">{{$item->name}}</h5>
                                <p class="card-text text-secondary mb-2">{{$item->description}}</p>
                                <p class="card-text text-secondary mb-2">
                                    Ano {{$item->veiculo_ano}} / KM {{$item->kilometers}} / {{$item->type}} / Cidade - {{$item->city}}</p>
                                <h5 class="mb-5">{{$item->price}}</h5>
                                <div class="actions">
                                    <button class="btn btn-primary">Entrar em contato</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card text-center p-3 d-flex align-items-center w-100">
                        <img src="{{asset('assets/images/encontrar.png')}}" alt="empty-state" width="300">
                        <h4>Nenhum Veículo Encontrado</h4>
                    </div>
                @endempty
            </div>
        </div>
    </div>
</div>


@endsection