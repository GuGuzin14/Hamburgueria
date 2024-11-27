<head>
    <link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css">
</head>

<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuário</label>
            <select name="usuario_id" id="usuario_id" class="form-control">
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $usuario->id == $cliente->id ? 'selected' : '' }}>
                        {{ $usuario->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="number" name="status" id="status" class="form-control" value="{{ $cliente->status }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
