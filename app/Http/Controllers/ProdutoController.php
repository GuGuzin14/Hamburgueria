<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Exibe a lista de produtos.
     */
    public function index()
    {
        $produtos = Produto::all(); // Linha onde pode haver erro
        return view('produtos.index', compact('produtos'));
    }
    
    
    /**
     * Exibe o formulário para criar um novo produto.
     */
    public function create()
    {
        // Retorna a view do formulário de cadastro
        return view('produtos.create');
    }

    /**
     * Salva um novo produto no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados enviados pelo formulário
        $data = $request->validate([
            'descricao' => 'required|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'tipo' => 'required|max:100',
        ]);
        

        // Verifica se há uma foto enviada e a salva no disco
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        // Cria um novo registro no banco
        Produto::create($data);

        // Redireciona para a listagem com uma mensagem de sucesso
        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }
}
