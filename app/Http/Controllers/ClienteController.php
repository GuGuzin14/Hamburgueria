<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Usuario;

class ClienteController extends Controller
{
    // Exibe todos os clientes
    public function index()
    {
        $clientes = Cliente::all(); // Obtém todos os clientes
        return view('clientes.index', compact('clientes')); // Envia para a view
    }
    

    // Exibe o formulário de criação de cliente
    public function create()
    {
        $usuarios = Usuario::all(); // Pega todos os usuários
        return view('clientes.create', compact('usuarios')); // Passa os usuários para a view
    }

    // Armazena um novo cliente no banco de dados
    public function store(Request $request)
    {
        Cliente::create($request->all()); // Cria o cliente com base nos dados enviados
        return redirect()->route('clientes.index');
    }

    // Exibe o formulário de edição de um cliente
    public function edit($id)
    {
        $cliente = Cliente::find($id); // Encontra o cliente pelo ID
        if ($cliente) {
            $usuarios = Usuario::all(); // Pega todos os usuários
            return view('clientes.edit', compact('cliente', 'usuarios')); // Passa o cliente e os usuários para a view
        } else {
            return redirect()->route('clientes.index');
        }
    }

    // Atualiza os dados de um cliente existente
    public function update(Request $request, $id)
    {
        $data = $request->only(['status', 'id']); // Define os campos a serem atualizados
        Cliente::where('id', $id)->update($data);
        return redirect()->route('clientes.index');
    }

    // Remove um cliente do banco de dados
    public function destroy($id)
    {
        Cliente::where('id', $id)->delete(); // Deleta o cliente pelo ID
        return redirect()->route('clientes.index');
    }
}
