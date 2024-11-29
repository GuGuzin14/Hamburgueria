<div class="container mt-5">
    <h1 class="text-center mb-4">Cadastrar Funcionário</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('funcionarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" name="matricula" id="matricula" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
