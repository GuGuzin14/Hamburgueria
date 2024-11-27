<?php
namespace app\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;



Route::get('/', function () {
    return view('welcome'); });

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios-index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios-create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios-store');
Route::get('/usuarios/{id}/edit',[UsuarioController::class, 'edit'])->name('usuarios-edit');
Route::put('/usuarios/{id}',[UsuarioController::class, 'update'])->name('usuarios-update');
Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy'])->name('usuarios-destroy');

Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

