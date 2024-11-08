<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        //dd($usuarios);
        return view('usuarios.index',['vetorUsuarios'=>$usuarios]);
    }
    public function create()
    {
        return view('usuarios.create');
    }
    public function store(Request $request)
    {
        //dd($request);
        Usuario::create($request->all());
        return redirect()->route('usuarios-index');
    }
    public function edit($id)
    {
        $usuario = Usuario::where('id',$id)->first();
        if (!empty($usuario))
            //dd($usuario);
            return view('usuarios.edit',['usuario'=>$usuario]);
        else
            return redirect('/usuarios');
    }
    public function update(Request $request, $id)
    {
        //dd($id);
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password  ];
        Usuario::where('id',$id)->update($data);
        return redirect('/usuarios');
    }
    public function destroy($id)
    {
        //dd($id);
        Usuario::where('id',$id)->delete();
        return redirect('/usuarios');
    }
}
