<head>
    <link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css">
</head>

<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Pedidos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Funcionário</th>
                <th>Horário</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente->nome ?? 'N/A' }}</td>
                    <td>{{ $pedido->funcionario->nome ?? 'N/A' }}</td>
                    <td>{{ $pedido->horario }}</td>
                    <td>R$ {{ number_format($pedido->total, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('pedidos.create') }}" class="btn btn-success">Cadastrar Pedido</a>
</div>
