<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;



Route::get('/', function () {
    return view('welcome');
});

// Rotas para Usuários
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios-index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios-create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios-store');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios-edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios-update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios-destroy');

// Rotas para Clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

// Rotas para Produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');

