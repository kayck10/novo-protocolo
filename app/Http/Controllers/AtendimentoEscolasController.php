<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use App\Models\Local;
use Illuminate\Http\Request;

class AtendimentoEscolasController extends Controller
{
    public function index () {
        $escolas = Local::all();
        return view('atendimento-escolas.index', compact('escolas'));
    }

    public function store (Request $request) {
        return response()->json(['error' => false, 'message' => 'Atendimento cadastro com sucesso!', 'dados-infomardo' => $request->all()]);
    }
}
