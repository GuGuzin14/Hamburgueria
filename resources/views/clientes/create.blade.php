<head>
    <link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css">
</head>

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    <label for="id">ID do Usuário:</label>
    <input type="number" name="id" required>
    <br><br>
    
    <label for="status">Status:</label>
    <input type="number" name="status" required>
    <br><br>

    <button type="submit">Cadastrar Cliente</button>
</form>
