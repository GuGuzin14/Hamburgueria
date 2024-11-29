<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Exibe a lista de funcionários.
     */
    public function index()
    {
        // Recupera todos os funcionários do banco de dados
        $funcionarios = Funcionario::all();
        
        // Retorna a view com os dados dos funcionários
        return view('funcionarios.index', compact('funcionarios'));
    }
    
    /**
     * Exibe o formulário para criar um novo funcionário.
     */
    public function create()
    {
        // Retorna a view do formulário de cadastro
        return view('funcionarios.create');
    }

    /**
     * Salva um novo funcionário no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados enviados pelo formulário
        $data = $request->validate([
            'matricula' => 'required|unique:funcionarios|integer', // Validação de matrícula
            'login' => 'required|max:255',
            'senha' => 'required|min:6', // Senha com no mínimo 6 caracteres
        ]);

        // Cria um novo funcionário no banco de dados
        Funcionario::create([
            'matricula' => $data['matricula'],
            'login' => $data['login'],
            'senha' => bcrypt($data['senha']), // Criptografa a senha antes de salvar
        ]);

        // Redireciona para a lista de funcionários com uma mensagem de sucesso
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    /**
     * Exibe o formulário para editar um funcionário existente.
     */
    public function edit($id)
    {
        // Recupera o funcionário pelo ID
        $funcionario = Funcionario::findOrFail($id);

        // Retorna a view com os dados do funcionário
        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Atualiza as informações de um funcionário no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados enviados pelo formulário
        $data = $request->validate([
            'matricula' => 'required|integer|unique:funcionarios,matricula,' . $id, // Exclui o funcionário atual da validação
            'login' => 'required|max:255',
            'senha' => 'nullable|min:6', // Senha opcional no caso de não querer alterar
        ]);

        // Encontra o funcionário no banco
        $funcionario = Funcionario::findOrFail($id);

        // Atualiza os dados do funcionário
        $funcionario->update([
            'matricula' => $data['matricula'],
            'login' => $data['login'],
            'senha' => isset($data['senha']) ? bcrypt($data['senha']) : $funcionario->senha, // Se não houver senha no formulário, mantém a antiga
        ]);

        // Redireciona para a lista de funcionários com uma mensagem de sucesso
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Remove um funcionário do banco de dados.
     */
    public function destroy($id)
    {
        // Encontra o funcionário no banco
        $funcionario = Funcionario::findOrFail($id);

        // Deleta o funcionário
        $funcionario->delete();

        // Redireciona para a lista de funcionários com uma mensagem de sucesso
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário deletado com sucesso!');
    }
}
