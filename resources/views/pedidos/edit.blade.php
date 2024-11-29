<head>
    <link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css">
</head>

<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Pedido</h1>

    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Seleção do Cliente -->
        <div class="mb-3">
            <label for="idCliente" class="form-label">Cliente</label>
            <select name="idCliente" id="idCliente" class="form-control">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $pedido->idCliente ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Seleção do Funcionário -->
        <div class="mb-3">
            <label for="idFuncionario" class="form-label">Funcionário</label>
            <select name="idFuncionario" id="idFuncionario" class="form-control">
                @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}" {{ $funcionario->id == $pedido->idFuncionario ? 'selected' : '' }}>
                        {{ $funcionario->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo Horário -->
        <div class="mb-3">
            <label for="horario" class="form-label">Horário</label>
            <input type="datetime-local" name="horario" id="horario" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($pedido->horario)) }}" required>
        </div>

        <!-- Campo Total -->
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" name="total" id="total" class="form-control" value="{{ $pedido->total }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Pedido</button>
    </form>
</div>
