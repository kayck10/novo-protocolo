<?php

namespace App\Http\Controllers;

use App\Models\Funcoes;
use App\Models\TiposUsuarios;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
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
        Toastr::success('Usuário Cadastrado com Sucesso', 'Concluído!', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }
}
