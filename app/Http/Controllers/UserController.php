<?php

namespace App\Http\Controllers;

use App\Models\Funcoes;
use App\Models\Situacao;
use App\Models\TiposUsuarios;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {
        $users = User::withCount([
            'atendimentos',
            'atendimentosInternos',
            'atendimentosEscolas',
        ])->get();

        $funcoes = Funcoes::all();

        return view('user.index', compact('users', 'funcoes'));
    }


    public function create()
    {
        $funcoes = Funcoes::distinct()->get();
        $tipos = TiposUsuarios::distinct()->get();

        return view('user.create', compact('funcoes', 'tipos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:users,usuario',
            'email' => 'required|email|max:255|unique:users,email',
            'id_funcoes' => 'required|exists:funcoes,id',
            'id_tipos_usuarios' => 'required|exists:tipos_usuarios,id',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'usuario.required' => 'O campo usuário é obrigatório.',
            'usuario.unique' => 'Este nome de usuário já está em uso.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'id_funcoes.required' => 'Por favor, selecione uma função.',
            'id_tipos_usuarios.required' => 'Por favor, selecione um tipo de usuário.',
        ]);

        $senha = '$2a$12$n7fLncjyhEg.pdchlD11wOtOCiohWohA8UZmjKhoUuhUCyWEOBrey';

        $user = User::create([
            'name' => $request->name,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'password' => $senha,
            'id_funcoes' => $request->id_funcoes,
            'id_tipos_usuarios' => $request->id_tipos_usuarios,
            'id_situacao' => 1,
        ]);

        Toastr::success('Usuário cadastrado com sucesso!', 'Concluído!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }


    public function show(Request $request, $id)
    {

        $funcoes = Funcoes::all();
        $user = User::with(['tipoUsuario', 'funcao', 'situacao'])->findOrFail($id);
        $tipos = TiposUsuarios::all();
        $situacoes = Situacao::all();

        return view('user.show', compact('user', 'funcoes', 'tipos', 'situacoes'));
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->usuario = $request->input('usuario');
        $user->email = $request->input('email');
        $user->id_tipos_usuarios = $request->input('id_tipos_usuarios');
        $user->id_funcoes = $request->input('id_funcoes');
        $user->id_situacao = $request->input('id_situacao');

        $user->save();
        Toastr::success('Usuário atualizado com sucesso!', 'Concluído!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::with(['funcao', 'tipoUsuario'])->findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function atualizarUsuario(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => [
                'nullable',
                'string',
                'min:6',
                'max:15',
                'regex:/[A-Z]/',
                'regex:/[$*&@#]/'
            ],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.edit', $user->id)->with('success', 'Usuário atualizado com sucesso!');
    }
}
