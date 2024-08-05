<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;

class InservivelController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamentos::with('setorEscola')->where('inservivel', true)->get();
        return view('inservivel.index', compact('equipamentos'));
    }

    public function create()
    {
        $equipamentos = Equipamentos::with('setorEscola')->where('inservivel', true)->get();
        return view('inservivel.create', compact('equipamentos'));
    }

    public function show($id)
    {
        $equipamento = Equipamentos::with('setorEscola')->find($id);
        if (!$equipamento) {
            return response()->json(['error' => 'Equipamento não encontrado'], 404);
        }
        return response()->json($equipamento);
    }
}
