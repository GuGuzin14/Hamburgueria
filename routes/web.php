<?php
namespace app\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome'); });

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios-index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios-create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios-store');
Route::get('/usuarios/{id}/edit',[UsuarioController::class, 'edit'])->name('usuarios-edit');
Route::put('/usuarios/{id}',[UsuarioController::class, 'update'])->name('usuarios-update');
Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy'])->name('usuarios-destroy');

/*
Route::get('/user/{id}', function ($id) {
    return view('usuario',['id' => $id]);
});
Route::get('/usuario', function () {
    $numero = 1;
    return view('usuario',['numero' => $numero]);
});
Route::get('/', function () {
    $nome = "Admin";
    $codigo = 12;
    $lanches = ["X-Salada","X-Bacon","X-Tudo"];
    return view('welcome',[
        'nome' => $nome,
        'codigo' => $codigo,
        'lanches' => $lanches]);
});
*/