<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use App\Models\Local;
use Illuminate\Http\Request;

class AtendimentoEscolasController extends Controller
{
    public function index()
    {
        $escolas = Local::where('externo', 1)->orderBy('desc')->get();
        return view('atendimento-escolas.index', compact('escolas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'local' => 'required|exists:local,id',
        ]);

        $atendimento = Atendimentos::create([
            'id_local' => $request->input('local'),
            'externo' => 1,
            'desc_problema' => $request->problema,

        ]);

        return response()->json($atendimento, 201);
    }
}
