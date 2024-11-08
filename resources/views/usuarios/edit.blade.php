<h1>EDITAR USUÁRIO <h1>

<form action="{{route('usuarios-update',['id'=>$usuario->id])}}" method="POST">
	@csrf
	@method('PUT'){{--Alterar para PUT por conta do Laravel--}}
	<label>Nome: </label>
	<input type="text" name="name" value="{{$usuario->name}}" placeholder="Digite o nome">	
	<br><br>
	<label>E-mail: </label>
	<input type="text" name="email" value="{{$usuario->email}}"placeholder="Digite o e-mail">
	<br><br>
	<label>Password: </label>
	<input type="text" name="password" value="{{$usuario->password}}"placeholder="Digite a senha">
	<br><br>
	<p> <input type="submit" name="submit" value="Altualizar" </p>
</form>
