<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Usuario; // Importa o modelo Usuario
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function create()
    {
        // Aqui você pode passar os usuários para o formulário de criação de cliente
        $usuarios = Usuario::all(); // Pega todos os usuários

        return view('clientes.create', compact('usuarios')); // Retorna a view de criação com os usuários
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
    