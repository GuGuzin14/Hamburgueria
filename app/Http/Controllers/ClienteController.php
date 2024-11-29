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
        public function store(Request $request)
        {
            // Criação do cliente
            $cliente = new Cliente;
            $cliente->status = $request->input('status');
            $cliente->id = $request->input('id');  // ID do usuário
    
            // Salva o cliente no banco de dados
            $cliente->save();
    
            // Redireciona para a lista de clientes após o cadastro
            return redirect()->route('clientes.index');
        }
    }
    