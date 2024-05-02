<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use App\Models\Local;
use Illuminate\Http\Request;

class AtendimentoEscolasController extends Controller
{
    public function index()
    {
        $escolas = Local::all();
        return view('atendimento-escolas.index', compact('escolas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_local' => 'required|exists:local,id',
            'externo' => 'required|boolean',
        ]);
        $local = Local::find($request->input('id_local'));
        if ($local->desc === 'Secretaria de Educacao') {
            if ($request->input('externo')) {
                return response()->json([
                    'message' => 'Para Secretaria de Educacao, "externo" não deve ser marcado'
                ], 400);
            }
        } else {
            if (!$request->input('externo')) {
                return response()->json([
                    'message' => 'Para locais que não sejam na Secretária de Educação externo deverá ser marcado'
                ], 400);
            }
        }
        $atendimento = Atendimentos::create([
            'id_local' => $request->input('id_local'),
            'externo' => $request->input('externo'),
        ]);

        return response()->json($atendimento, 201);
    }
}
