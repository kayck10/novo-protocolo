<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\ProtocoloEntrada;
use App\Models\User;
use Illuminate\Http\Request;

class EstanteController extends Controller
{
    public function index()
    {
        $protocoloEntrada = ProtocoloEntrada::all();
        $ativos = Equipamentos::where('id_status', 1)->count();
        $emManutencao = Equipamentos::where('id_status', 2)->count();
        $inativos = Equipamentos::where('id_status', 3)->count();

        $equipamentos = Equipamentos::all();

        $usuarios = User::where('id_situacao', 1)->orderBy('name', 'asc')->get();

        return view('estante.index', compact('equipamentos', 'usuarios', 'ativos', 'emManutencao', 'inativos', 'protocoloEntrada'));
    }

    public function getStatus(Request $request)
    {
        $usuarios = User::where('id_funcoes', 2)->get();
        $equipamentos = Equipamentos::where('id_status', $request->statusEq)
            ->with('protocolo') // Certifique-se de carregar o relacionamento 'protocolo'
            ->get();

        return view('estante.equipamentos-status', compact('equipamentos', 'usuarios'));
    }

    public function getStatusModal(Request $request)
    {
        $equipamento = Equipamentos::with('protocolo.local')->find($request->id);
        $protocoloEntrada = ProtocoloEntrada::find($equipamento->id_protocolo);
        $usuarios = User::where('id_funcoes', 2)->get();

        return response()->json([
            'equipamento' => $equipamento,
            'protocoloEntrada' => $protocoloEntrada,
            'usuarios' => $usuarios
        ]);
    }

    public function passar(Request $request)
    {
        $equipamento = Equipamentos::find($request->id);
        $equipamento->update([
            'id_status' => $request->statusEq,
            'id_users'  => $request->id_tecnico
        ]);

        return response()->json(['success' => 'Status atualizado com sucesso!']);
    }
    public function saida(Request $request)
    {
        $equipamento = Equipamentos::find($request->id);
        $equipamento->update([
            'id_status' => 3,
            'solucao'   => $request->solucao
        ]);

        return response()->json(['success' => 'Equipamento atualizado com sucesso!']);
    }
    public function retirar(Request $request)
    {
        $equipamento = Equipamentos::find($request->id);
        $equipamento->id_status = 4;
        $equipamento->save();

        return response()->json(['success' => 'Equipamento atualizado com sucesso.']);
    }

    public function inservivel(Request $request)
    {
        $equipamento = Equipamentos::find($request->id);
        $equipamento->inservivel = true;
        $equipamento->save();

        return response()->json(['success' => 'Equipamento marcado como inservível com sucesso.']);
    }
}
