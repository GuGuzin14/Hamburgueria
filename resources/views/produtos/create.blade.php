@extends('layouts.app')

@section('content')
<h1>Cadastrar Produto</h1>

<form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Descrição:</label>
        <input type="text" name="descricao" required>
    </div>
    <div>
        <label>Foto:</label>
        <input type="file" name="foto">
    </div>
    <div>
        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" required>
    </div>
    <div>
        <label>Estoque:</label>
        <input type="number" name="estoque" required>
    </div>
    <div>
        <label>Tipo:</label>
        <input type="text" name="tipo" required>
    </div>
    <button type="submit">Salvar</button>
</form>
@endsection
