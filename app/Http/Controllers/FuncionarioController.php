<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matricula' => 'required|unique:funcionarios',
            'login' => 'required|unique:funcionarios',
            'senha' => 'required|min:6',
        ]);

        Funcionario::create($validatedData);
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'matricula' => 'required|unique:funcionarios,matricula,' . $id,
            'login' => 'required|unique:funcionarios,login,' . $id,
            'senha' => 'required|min:6',
        ]);

        Funcionario::where('id', $id)->update($validatedData);
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Funcionario::destroy($id);
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
    }
}
