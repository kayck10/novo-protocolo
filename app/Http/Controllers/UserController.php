<?php

namespace App\Http\Controllers;

use App\Models\Funcoes;
use App\Models\TiposUsuarios;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Database\Seeders\Funcao;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $funcoes = Funcoes::all();

        return view('user.index', compact('users', 'funcoes'));
    }

    public function create()
    {
        $user = User::all();
        $funcoes = Funcoes::all();
        $tipos = TiposUsuarios::all();
        return view('user.create', compact('funcoes', 'tipos'));
    }

    public function store(Request $request)
    {
        $senha = '$2a$12$n7fLncjyhEg.pdchlD11wOtOCiohWohA8UZmjKhoUuhUCyWEOBrey';

        $user = User::create([
            'name' => $request->name,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'password' => $senha,
            'id_funcoes' => $request->id_funcoes,
            'id_tipos_usuarios' => $request->id_tipos_usuarios,
        ]);
        Toastr::success('Usuário Cadastrado com sucesso!', 'Concluído!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    public function show(Request $request, $id)
    {
        $user = User::with(['tipoUsuario', 'funcao'])->findOrFail($id);

        return view('user.show', compact('user'));
    }

    public function update(Request $request, $id)
    {

            $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->usuario = $request->input('usuario');
        $user->email = $request->input('email');
        $user->tipoUsuario->desc = $request->input('tipo_usuario');
        $user->funcao->desc = $request->input('funcao');
        $user->situacao = $request->input('situacao');

        $user->save();
        Toastr::success('Usuário atualizado com sucesso!', 'Concluído!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('user.index');
    }

}
