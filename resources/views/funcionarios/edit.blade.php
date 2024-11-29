<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Funcionário</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" name="matricula" id="matricula" class="form-control" value="{{ $funcionario->matricula }}" required>
        </div>
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" class="form-control" value="{{ $funcionario->login }}" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" value="{{ $funcionario->senha }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
