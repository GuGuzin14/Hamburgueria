<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Funcionario;

class PedidoController extends Controller
{
    // Exibe todos os pedidos
    public function index()
    {
        $pedidos = Pedido::with(['cliente', 'funcionario'])->get(); // Carrega os relacionamentos
        return view('pedidos.index', compact('pedidos'));
    }

    // Exibe o formulário de criação de um pedido
    public function create()
    {
        $clientes = Cliente::all(); // Obtém todos os clientes
        $funcionarios = Funcionario::all(); // Obtém todos os funcionários
        return view('pedidos.create', compact('clientes', 'funcionarios'));
    }

    // Armazena um novo pedido no banco de dados
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idCliente' => 'required|exists:clientes,id', // Cliente deve existir
            'idFuncionario' => 'required|exists:funcionarios,id', // Funcionário deve existir
            'horario' => 'required|date', // Deve ser uma data válida
            'total' => 'required|numeric|min:0', // Valor mínimo de 0
        ]);

        Pedido::create($validatedData); // Salva o pedido com os dados validados

        return redirect()->route('pedidos.index')->with('success', 'Pedido cadastrado com sucesso!');
    }

    // Exibe o formulário de edição de um pedido
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id); // Busca o pedido ou lança erro 404
        $clientes = Cliente::all(); // Obtém todos os clientes
        $funcionarios = Funcionario::all(); // Obtém todos os funcionários
        return view('pedidos.edit', compact('pedido', 'clientes', 'funcionarios'));
    }

    // Atualiza os dados de um pedido existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'idCliente' => 'required|exists:clientes,id',
            'idFuncionario' => 'required|exists:funcionarios,id',
            'horario' => 'required|date',
            'total' => 'required|numeric|min:0',
        ]);

        $pedido = Pedido::findOrFail($id); // Busca o pedido ou lança erro 404
        $pedido->update($validatedData); // Atualiza os dados do pedido

        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    // Remove um pedido do banco de dados
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id); // Busca o pedido ou lança erro 404
        $pedido->delete(); // Remove o pedido

        return redirect()->route('pedidos.index')->with('success', 'Pedido excluído com sucesso!');
    }
}
