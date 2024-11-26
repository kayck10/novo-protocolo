<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Problema;
use App\Models\ProtocoloEntrada;
use App\Models\Local;
use App\Models\SetorEscola;
use App\Models\TiposEquipamentos;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function gerarPDF(Request $request)
    {
        $equipamento = Equipamentos::find($request->id_equipamento);

        if (!$equipamento) {
            return response()->json(['error' => 'Equipamento não encontrado'], 404);
        }

        if ($equipamento->id_status == 5) {
            $equipamento->modelo = $request->modelo;
            $equipamento->marca = $request->marca;
            $equipamento->num_serie = $request->num_serie;
            $equipamento->id_status = 6;
            $equipamento->retirada = $request->has('retirada') ? 1 : 0;
            $equipamento->save();
        }

        $protocolo = ProtocoloEntrada::find($equipamento->id_protocolo);
        if (!$protocolo) {
            return response()->json(['error' => 'Protocolo não encontrado'], 404);
        }

        $problema = Problema::find($request->id_problema);
        $local = Local::find($protocolo->id_local);
        $setor = SetorEscola::find($equipamento->id_setor_escolas);

        $tipoEquipamento = TiposEquipamentos::find($equipamento->id_tipos_equipamentos);
        $tipoNome = $tipoEquipamento ? $tipoEquipamento->desc : 'N/A';

        $data = [
            'local' => $local ? $local->desc : 'N/A',
            'setor' => $setor ? $setor->desc : 'N/A',
            'tipo' => $tipoNome,
            'solucao' => $equipamento->solucao,
            'num_patrimonio' => $equipamento->tombamento,
            'problema' => $problema,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'num_serie' => $request->num_serie,
            'equipamento' => $equipamento,

        ];

        $pdf = FacadePdf::loadView('inservivel.pdf', $data);
        return $pdf->stream('inservivel.pdf');
    }


    public function verificarId(Request $request)
    {
        $equipamento = Equipamentos::find($request->id);
        if ($equipamento->id_status == 5) {
            return 0;
        }

        return 1;
    }


    public function gerarprotocoloPDF(Request $request)
    {
        $equipamento = Equipamentos::latest()->first();

        if (!$equipamento) {
            return response()->json(['error' => 'Equipamento não encontrado'], 404);
        }

        $local = $equipamento->protocolo->local->desc ?? 'Local não definido';
        $setor = $equipamento->setorEscola->desc ?? 'Setor não definido';
        $tipoEquipamento = $equipamento->tiposEquipamentos->desc ?? 'Tipo de equipamento não definido';
        $acessorios = $equipamento->acessorios ?? 'Sem acessórios';
        $problemaRelatado = $equipamento->desc ?? 'Problema não relatado';
        $dataEntrada = $equipamento->protocolo->data_entrada ? \Carbon\Carbon::parse($equipamento->protocolo->data_entrada)->format('d/m/Y') : 'Data não definida';
        $horaEntrada = $equipamento->protocolo->data_entrada ? \Carbon\Carbon::parse($equipamento->protocolo->data_entrada)->format('H:i') : 'Hora não definida';

        $data = [
            'local' => $local,
            'setor' => $setor,
            'tombamento' => $equipamento->tombamento,
            'tipoEquipamento' => $tipoEquipamento,
            'acessorios' => $acessorios,
            'problemaRelatado' => $problemaRelatado,
            'dataEntrada' => $dataEntrada,
            'horaEntrada' => $horaEntrada,
        ];

        $pdf = FacadePdf::loadView('protocolo-entrada.pdf', $data);
        return $pdf->stream('protocolo-entrada.pdf');
    }


    public function pdfInservivel(Request $request)
    {
        if (!$request->has('id_equipamento')) {
            abort(404, 'Equipamento não encontrado.');
        }

        $equipamento = Equipamentos::find($request->id_equipamento);
        if (!$equipamento) {
            abort(404, 'Equipamento não encontrado.');
        }

        $protocolo = ProtocoloEntrada::find($equipamento->id_protocolo);
        $problema = Problema::find($request->id_problema);

        $local = Local::find($protocolo->id_local ?? null);
        $setor = SetorEscola::find($equipamento->id_setor_escolas ?? null);

        $tipoEquipamento = TiposEquipamentos::find($equipamento->id_tipos_equipamentos);
        $tipoNome = $tipoEquipamento ? $tipoEquipamento->desc : 'N/A';

        $data = [
            'equipamento' => $equipamento,
            'local' => $local ? $local->desc : 'N/A',
            'setor' => $setor ? $setor->desc : 'N/A',
            'tipo' => $tipoNome,
            'solucao' => $equipamento->solucao,
            'num_patrimonio' => $equipamento->tombamento,
            'problema' => $problema ? $problema->descricao : 'N/A',
            'marca' => $equipamento->marca ?? 'N/A',
            'modelo' => $equipamento->modelo ?? 'N/A',
            'num_serie' => $equipamento->num_serie ?? 'N/A',
        ];


        $pdf = FacadePdf::loadView('inservivel.pdf', $data);

        return $pdf->stream('inservivel.pdf', ['Attachment' => false]);
    }


    public function indexProtocolo(Request $request)
    {

        $requestProtocolo = $request->input('id_protocolo');

        $equipamentos = Equipamentos::with('tiposEquipamentos', 'protocolo.local', 'setorEscola')
            ->where('id_protocolo', $requestProtocolo)
            ->get();

        if ($equipamentos->isEmpty()) {
            return response()->json(['error' => 'Equipamento não encontrado'], 404);
        }

        $protocolo = $equipamentos->first()->protocolo;
        if (!$protocolo) {
            return response()->json(['error' => 'Protocolo de entrada não encontrado'], 404);
        }
        $ano = $protocolo->created_at->format('Y');
        $protocoloId = $ano . $protocolo->id;
        $local = $protocolo->local->desc ?? 'Local não definido';

        $arrayEquipamentos = [];

        foreach ($equipamentos as $equipamento) {
            $tombamento = $equipamento->tombamento ?? 'Tombamento não definido';
            $setor = $equipamento->setorEscola->desc ?? 'Setor não definido';
            $tipoEquipamento = $equipamento->tiposEquipamentos->desc ?? 'Tipo de equipamento não definido';
            $acessorios = $equipamento->acessorios ?? 'Sem acessórios';
            $problemaRelatado = $equipamento->desc ?? 'Problema não relatado';

            $arrayEquipamentos[] = [
                'tombamento'        => $tombamento,
                'setor'             => $setor,
                'tipoEquipamento'   => $tipoEquipamento,
                'acessorios'        => $acessorios,
                'problemaRelatado'  => $problemaRelatado
            ];
        }

        $dataEntrada = $protocolo->data_entrada ? \Carbon\Carbon::parse($protocolo->data_entrada)->format('d/m/Y') : 'Data não definida';
        $horaEntrada = $protocolo->data_entrada ? \Carbon\Carbon::parse($protocolo->data_entrada)->format('H:i') : 'Hora não definida';

        $data = [
            'local' => $local,
            'dataEquipamentos' => $arrayEquipamentos,
            'dataEntrada' => $dataEntrada,
            'horaEntrada' => $horaEntrada,
            'tombamento' => $tombamento,
            'protocoloId' => $protocoloId,
        ];

        $pdf = FacadePdf::loadView('protocolo-entrada.index-pdf', $data);

        $pdfContent = $pdf->output();
        $base64Pdf = base64_encode($pdfContent);

        return response()->json([
            'pdf' => $base64Pdf
        ]);
    }
}
