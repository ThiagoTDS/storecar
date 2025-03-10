<?php

use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',[VeiculoController::class, 'listaVeiculos'])->name("veiculos.list");
Route::get('/veiculo/create',[VeiculoController::class, 'create'])->name("veiculos.create");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
