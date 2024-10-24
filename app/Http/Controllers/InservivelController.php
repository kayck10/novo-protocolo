<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Inservivel;
use App\Models\Problema;
use App\Models\ProtocoloEntrada;
use App\Models\TiposEquipamentos;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InservivelController extends Controller
{
    public function index()
    {
        $problemas = Problema::all();
        $equipamentos = Equipamentos::with(['setorEscola', 'user', 'tiposEquipamentos', 'protocolo'])
            ->where('id_status', 6)
            ->get();
        $protocolos = ProtocoloEntrada::all();
        return view('inservivel.index', compact('equipamentos', 'protocolos', 'problemas'));
    }

    public function create()
    {
        $equipamentos = Equipamentos::with(['setorEscola', 'user', 'tiposEquipamentos', 'protocolo'])
            ->where('id_status', 5)
            ->get();

        $protocolos = ProtocoloEntrada::all();

        return view('inservivel.create', compact('equipamentos', 'protocolos'));
    }

    public function store(Request $request)
    {
        $retirada = $request->has('retirada') ? 1 : 0;

        $equipamento = Equipamentos::find($request->id_equipamento);

        $equipamento->retirada = $retirada;

        $equipamento->marca = $request->input('marca');
        $equipamento->modelo = $request->input('modelo');
        $equipamento->num_serie = $request->input('num_serie');
        $equipamento->save();

        return redirect()->back()->with('success', 'Equipamento atualizado com sucesso!');
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
        $equipamento->retirada = 0;
        $equipamento->save();

        return response()->json(['message' => 'Equipamento devolvido com sucesso!'], 200);
    }

    public function atualizar($id)
    {
        $equipamento = Equipamentos::findOrFail($id);
        $equipamento->id_status = 3;
        $equipamento->save();

        return response()->json(['success' => 'Equipamento devolvido com sucesso!']);
    }
}
