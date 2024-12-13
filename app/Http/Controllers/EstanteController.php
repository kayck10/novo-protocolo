<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Historico;
use App\Models\ProtocoloEntrada;
use App\Models\TiposEquipamentos;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class EstanteController extends Controller
{
    public function index()
    {
        $tiposequipamentos = TiposEquipamentos::all();
        $protocoloEntrada = ProtocoloEntrada::all();
        $historico = Historico::all();
        $ativos = Equipamentos::where('id_status', 1)->count();
        $emManutencao = Equipamentos::where('id_status', 2)->count();
        $inativos = Equipamentos::where('id_status', 3)->count();

        $equipamentos = Equipamentos::all();

        $usuarios = User::where('id_situacao', 1)->orderBy('name', 'asc')->get();

        return view('estante.index', compact('equipamentos', 'usuarios', 'ativos', 'emManutencao', 'inativos', 'protocoloEntrada', 'tiposequipamentos', 'historico'));
    }

    public function getStatus(Request $request)
    {
        $usuarios = User::where('id_funcoes', 2)->get();

        $equipamentos = Equipamentos::where('id_status', $request->statusEq)->orderBy('prioridade', 'DESC')
            ->orderBy('id', 'ASC')
            ->get();

            $historicos = Historico::with(['protocolo' => function ($query) {
                $query->orderBy('data_entrada', 'DESC');
            }])
            ->get();

            // dd($historicos);

        return view('estante.equipamentos-status', compact('equipamentos', 'usuarios', 'historicos'));
    }

    public function getStatusModal(Request $request)
    {
        $equipamento = Equipamentos::all();
        $historico = Historico::with('protocolo.local')->find($request->id);
        $protocoloEntrada = ProtocoloEntrada::find($equipamento->id_protocolo);
        $usuarios = User::where('id_funcoes', 2)->get();

        return response()->json([
            'historico' => $historico,
            'equipamento' => $equipamento,
            'protocoloEntrada' => $protocoloEntrada,
            'usuarios' => $usuarios
        ]);
    }

    public function passar(Request $request)
    {

        $equipamento = Equipamentos::find($request->id);

        if ($request->statusEq == 1) {
            $equipamento->update([
                'id_status' => $request->statusEq,
                'id_users'  => null
            ]);
        } elseif ($request->statusEq == 2) {
            $equipamento->update([
                'id_status' => $request->statusEq,
                'id_users'  => $request->id_tecnico
            ]);
        } elseif ($request->statusEq == 3) {
            $equipamento->update([
                'id_status' => $request->statusEq,
                'id_users'  => $request->id_tecnico,
                'solucao'  => $request->solucao
            ]);
        }



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
        $equipamento->id_status = 5;
        $equipamento->save();

        return response()->json(['success' => 'Equipamento marcado como inservível com sucesso.']);
    }


    public function pdf($id)
    {
        $historico = Historico::with('user', 'protocolo.local')->findOrFail($id);

        $equipamento = Equipamentos::with('tiposEquipamentos')->findOrFail($id);

        if (!$equipamento) {
            return response()->json(['error' => 'Equipamento não encontrado'], 404);
        }

        $local = $historico->protocolo->local->desc ?? 'Local não definido';
        $setor = $historico->setorEscola->desc ?? 'Setor não definido';

        $tipoEquipamento = $equipamento->tiposEquipamentos->desc ?? 'Tipo de equipamento não definido';
        $acessorios = $historico->acessorios ?? 'Sem acessórios';

        $dataEntrada = $historico->protocolo->data_entrada ? \Carbon\Carbon::parse($historico->protocolo->data_entrada)->format('d/m/Y') : 'Data não definida';
        $horaEntrada = $historico->protocolo->data_entrada ? \Carbon\Carbon::parse($historico->protocolo->data_entrada)->format('H:i') : 'Hora não definida';

        $tecnico = $historico->user->name ?? 'Técnico não definido';

        $data = [
            'local' => $local,
            'setor' => $setor,
            'tombamento' => $equipamento->tombamento,
            'tipoEquipamento' => $tipoEquipamento,
            'acessorios' => $acessorios,
            'dataEntrada' => $dataEntrada,
            'horaEntrada' => $horaEntrada,
            'solucao' => $historico->solucao,
            'tecnico' => $tecnico,
        ];

        $pdf = FacadePdf::loadView('estante.pdf', $data);

        return $pdf->stream('detalhes_equipamento.pdf');
    }

    public function pesquisarPorTombamento(Request $request)
{
    $tombamento = $request->input('tombamento');

    $equipamentos = Equipamentos::where('tombamento', 'like', '%' . $tombamento . '%')->get();

    return view('estante.equipamentos-status', compact('equipamentos'));
}

}
