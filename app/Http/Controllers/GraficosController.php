<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GraficosController extends Controller
{
    public function anual()
    {
        return view('graficos.anual');
    }

    public function inserviveis()
    {
        return view('graficos.inserviveis');
    }

    public function participacoes()
    {
        $usuarios = User::where('id_funcoes', 2)->get();
        return view('graficos.participacoes', compact('usuarios'));
    }
}
