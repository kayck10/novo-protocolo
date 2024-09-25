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
        $problemas = Problema::all();
        $equipamentos = Equipamentos::with(['setorEscola', 'user', 'tiposEquipamentos', 'protocolo'])->where('id_status', 6)->get();
        $protocolos = ProtocoloEntrada::all();
          return view('inservivel.index', compact('equipamentos', 'protocolos', 'problemas'));
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

    public function devolver(Request $request)
{
    $equipamento = Equipamentos::find($request->id_equipamento);

    $equipamento->id_status = 3;
    $equipamento->save();

    return response()->json(['message' => 'Equipamento devolvido com sucesso!'], 200);
}

}

