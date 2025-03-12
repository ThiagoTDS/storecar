@extends('layouts.app')

@section('content')

<div class="container">
    <div class="mb-3">
        <h3>Cadastrar/Editar veículo</h3>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                {!!csrf_field()!!}
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="name">Nome</label>
                        <input 
                        class="form-control"
                        id="name" 
                        name="name"
                        value="{{isset($item) ? $item->name: old('name') }}"
                        type="text"
                        autocomplete="off">
                        @error('name')
                        <div class="alert alert-danger mt-3"> {{$message}}</div>
                        @enderror
                    </div>
                     <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="brand">Marca</label>
                        <input 
                        class="form-control"
                        id="brand" 
                        name="brand"
                        value="{{isset($item) ? $item->brand: old('brand') }}"
                        type="text"
                        autocomplete="off">
                        @error('brand')
                        <div class="alert alert-danger mt-3"> {{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="veiculo_ano">Ano</label>
                        <input 
                        class="form-control"
                        id="veiculo_ano" 
                        name="veiculo_ano"
                        value="{{isset($item) ? $item->veiculo_ano: old('veiculo_ano') }}"
                        type="text"
                        autocomplete="off">
                        @error('veiculo_ano')
                        <div class="alert alert-danger mt-3"> {{$message}}</div>
                        @enderror
                    </div>
                     <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="kilometers">Kilometragem</label>
                        <input 
                        class="form-control"
                        id="kilometers" 
                        name="kilometers"
                        value="{{isset($item) ? $item->kilometers: old('kilometers') }}"
                        type="text"
                        autocomplete="off">
                        @error('kilometers')
                        <div class="alert alert-danger mt-3"> {{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="city">Cidade</label>
                        <input 
                        class="form-control"
                        id="city" 
                        name="city"
                        value="{{isset($item) ? $item->city: old('city') }}"
                        type="text"
                        autocomplete="off">
                        @error('city')
                        <div class="alert alert-danger mt-3"> {{$message}}</div>
                        @enderror
                    </div>
                     <div class="form-group col-sm-12 col-md-6 mb-3">
                        <label for="kilometers">Kilometragem</label>
                        <input 
                        class="form-control"
                        id="kilometers" 
                        name="kilometers"
                        value="{{isset($item) ? $item->kilometers: old('kilometers') }}"
                        type="text"
                        autocomplete="off">
                        @error('brand')
                        <div class="alert alert-danger mt-3"> {{$message}}</div>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






@endsection