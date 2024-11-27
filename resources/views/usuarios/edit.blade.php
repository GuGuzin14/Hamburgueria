<head>
    <link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css">
</head>

<div class="form-container">
    <h1>Editar Usuário</h1>

    <form action="{{route('usuarios-update',['id'=>$usuario->id])}}" method="POST" class="edit-form">
        @csrf
        @method('PUT')

        <div class="input-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{$usuario->name}}" placeholder="Digite o nome">
        </div>

        <div class="input-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="{{$usuario->email}}" placeholder="Digite o e-mail">
        </div>

        <div class="input-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" value="{{$usuario->password}}" placeholder="Digite a senha">
        </div>

        <div class="form-action">
            <button type="submit" name="submit">Atualizar</button>
        </div>
    </form>
</div>
