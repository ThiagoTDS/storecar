<?php

use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [VeiculoController::class, 'listaVeiculos'])->name("veiculos.list");

Route::get('/veiculo/create', [VeiculoController::class, 'create'])->name("veiculos.create");
Route::get('/veiculo/edit/{id}', [VeiculoController::class, 'edit'])->name("veiculo.edit");
Route::post('/veiculo', [VeiculoController::class, 'store'])->name('veiculo.store');
Route::put('/veiculo/{id}', [VeiculoController::class, 'update'])->name('veiculo.update');
Route::delete('/veiculo/{id}', [VeiculoController::class, 'destroy'])->name('veiculo.delete');

Auth::routes();

Route::get('/home', [VeiculoController::class, 'index'])->name('home');