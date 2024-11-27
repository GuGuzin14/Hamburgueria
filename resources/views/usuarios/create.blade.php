<head>
    <link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css">
</head>

<div class="container mt-5">
    <h1 class="text-center mb-4">CADASTRO DE USUÁRIO</h1>

    <form action="{{ route('usuarios-store') }}" method="POST" class="form">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Digite o nome" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Digite a senha" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
