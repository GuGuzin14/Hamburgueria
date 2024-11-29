@extends('layouts.app')

@section('content')
<h1>Produtos</h1>
<a href="{{ route('produtos.create') }}">Cadastrar Produto</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Foto</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>
                @if ($produto->foto)
                <img src="{{ asset('storage/' . $produto->foto) }}" width="50">
                @endif
            </td>
            <td>{{ $produto->preco }}</td>
            <td>{{ $produto->estoque }}</td>
            <td>{{ $produto->tipo }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
