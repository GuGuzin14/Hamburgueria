<h1>CADASTRO DE USUÁRIO</h1>

<form action="{{route('usuarios-store')}}" method="POST" >
	@csrf
	<label>Nome: </label>
	<input type="text" name="name" placeholder="Digite o nome">	
	<br><br>
	<label>E-mail: </label>
	<input type="text" name="email" placeholder="Digite o e-mail">
	<br><br>
	<label>Password: </label>
	<input type="text" name="password" placeholder="Digite a senha">
	<br><br>
	<p> <input type="submit" name="submit" value="Cadastrar"> </p>
</form>