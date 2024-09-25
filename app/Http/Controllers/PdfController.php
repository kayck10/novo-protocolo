<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Problema;
use App\Models\ProtocoloEntrada;
use App\Models\Local;
use App\Models\Setor;
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

        if ($equipamento->id_status == 5) {
            $equipamento->modelo = $request->modelo;
            $equipamento->marca = $request->marca;
            $equipamento->num_serie = $request->num_serie;
            $equipamento->id_status = 6;
            $equipamento->save();
        }

        if (!$equipamento) {
            return response()->json(['error' => 'Equipamento não encontrado'], 404);
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
        $equipamento = Equipamentos::find($request->id_equipamento);

        if (!$equipamento) {
            return response()->json(['error' => 'Equipamento não encontrado'], 404);
        }

        $local = $equipamento->protocolo->local->desc ?? 'Local não definido';
        $setor = $equipamento->setorEscola->desc ?? 'Setor não definido';

        $tipoEquipamento = $equipamento->tiposEquipamentos->desc ?? 'Tipo de equipamento não definido';
        $acessorios = $equipamento->acessorios ?? 'Sem acessórios';
        $problemaRelatado = $equipamento->solucao ?? 'Problema não relatado';

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
        $equipamento = Equipamentos::find($request->id_equipamento);
        $protocolo = ProtocoloEntrada::find($equipamento->id_protocolo);
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
            'problema' => $problema ? $problema->descricao : 'N/A',
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'num_serie' => $request->num_serie,
        ];

        $pdf = FacadePdf::loadView('inservivel.pdf', $data);

        return $pdf->stream('inservivel.pdf', ['Attachment' => false]);
    }

    }

