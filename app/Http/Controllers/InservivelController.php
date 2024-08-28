<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Inservivel;
use App\Models\Problema;
use App\Models\ProtocoloEntrada;
use Illuminate\Http\Request;

class InservivelController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamentos::with(['setorEscola', 'user', 'tiposEquipamentos', 'protocolo'])->where('id_status', 5)->get();
        return view('inservivel.index', compact('equipamentos'));
    }

    public function create()
    {
        $problemas = Problema::all();
        $equipamentos = Equipamentos::with(['setorEscola', 'user', 'tiposEquipamentos', 'protocolo'])->where('id_status', 5)->get();
        $protocolos = ProtocoloEntrada::all();
        return view('inservivel.create', compact('equipamentos', 'protocolos', 'problemas'));
    }

    public function store (Request $request) {
        $laudosInserviveis = Inservivel::create($request->all());
        return redirect()->back();
    }

    public function show($id)
    {
        $equipamento = Equipamentos::with(['setorEscola', 'user', 'tiposEquipamentos', 'protocolo'])->where('id_status', 5)->find($id);
        if (!$equipamento) {
            return response()->json(['error' => 'Equipamento não encontrado'], 404);
        }
        return response()->json($equipamento);
    }
}

