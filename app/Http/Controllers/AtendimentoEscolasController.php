<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use Illuminate\Http\Request;

class AtendimentoEscolasController extends Controller
{
    public function index () {
        return view('atendimento-escolas.index');
    }

    public function store (Request $request) {
        return response()->json(['error' => false, 'message' => 'Atendimento cadastro com sucesso!', 'dados-infomardo' => $request->all()]);
    }
}
