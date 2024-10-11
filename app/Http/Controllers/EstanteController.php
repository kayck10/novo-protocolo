<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\ProtocoloEntrada;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
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
        ->with(['protocolo' => function ($query) {
            $query->orderBy('data_entrada', 'DESC');
        }])
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

        if($request->statusEq == 1){
            $equipamento->update([
                'id_status' => $request->statusEq,
                'id_users'  => null
            ]);
        }elseif($request->statusEq == 2){
            $equipamento->update([
                'id_status' => $request->statusEq,
                'id_users'  => $request->id_tecnico
            ]);
        }elseif($request->statusEq == 3){
            $equipamento->update([
                'id_status' => $request->statusEq,
                'id_users'  => $request->id_tecnico,
                'solucao'  => $request->solucao
            ]);
        }



        return response()->json(['success' => 'Equipamento atualizado com sucesso!']);
    }
    // public function saida(Request $request)
    // {
    //     $equipamento = Equipamentos::find($request->id);
    //     $equipamento->update([
    //         'id_status' => 3,
    //         'solucao'   => $request->solucao,
    //         'id_users'  => $request->id_tecnico
    //     ]);

    //     return response()->json(['success' => 'Equipamento atualizado com sucesso!']);
    // }

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

    public function equipamento()
    {
        $equipamentos = Equipamentos::with('protocolo', 'tiposEquipamentos')->get();
        return view('equipamentos.lista-equipamentos', compact('equipamentos'));
    }




public function pdf( $id)
{
    $equipamento = Equipamentos::with('user', 'protocolo.local', 'tiposEquipamentos')->findOrFail($id);

     $equipamento = Equipamentos::findOrFail($id);

     if (!$equipamento) {
         return response()->json(['error' => 'Equipamento não encontrado'], 404);
     }

     $local = $equipamento->protocolo->local->desc ?? 'Local não definido';
     $setor = $equipamento->setorEscola->desc ?? 'Setor não definido';

     $tipoEquipamento = $equipamento->tiposEquipamentos->desc ?? 'Tipo de equipamento não definido';
     $acessorios = $equipamento->acessorios ?? 'Sem acessórios';

     $dataEntrada = $equipamento->protocolo->data_entrada ? \Carbon\Carbon::parse($equipamento->protocolo->data_entrada)->format('d/m/Y') : 'Data não definida';
     $horaEntrada = $equipamento->protocolo->data_entrada ? \Carbon\Carbon::parse($equipamento->protocolo->data_entrada)->format('H:i') : 'Hora não definida';

    $tecnico = $equipamento->user->name ?? 'Técnico não definido';

     $data = [
         'local' => $local,
         'setor' => $setor,
         'tombamento' => $equipamento->tombamento,
         'tipoEquipamento' => $tipoEquipamento,
         'acessorios' => $acessorios,
         'dataEntrada' => $dataEntrada,
         'horaEntrada' => $horaEntrada,
         'solucao' => $equipamento->solucao,
         'tecnico' => $tecnico,
     ];

    $pdf = FacadePdf::loadView('estante.pdf', $data);

    return $pdf->stream('detalhes_equipamento.pdf');
}


}
