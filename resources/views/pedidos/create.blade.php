<head>
    <link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css">
</head>

<form action="{{ route('pedidos.store') }}" method="POST">
    @csrf
    <!-- Seleção do Cliente -->
    <label for="idCliente">Cliente:</label>
    <select name="idCliente" required>
        <option value="">Selecione um cliente</option>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
        @endforeach
    </select>
    <br><br>
    
    <!-- Seleção do Funcionário -->
    <label for="idFuncionario">Funcionário:</label>
    <select name="idFuncionario" required>
        <option value="">Selecione um funcionário</option>
        @foreach ($funcionarios as $funcionario)
            <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
        @endforeach
    </select>
    <br><br>

    <!-- Campo Horário -->
    <label for="horario">Horário:</label>
    <input type="datetime-local" name="horario" required>
    <br><br>

    <!-- Campo Total -->
    <label for="total">Total:</label>
    <input type="number" step="0.01" name="total" required>
    <br><br>

    <button type="submit">Cadastrar Pedido</button>
</form>
