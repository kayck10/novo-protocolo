<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Problema;
use App\Models\ProtocoloEntrada;
use App\Models\Local;
use App\Models\Setor;
use App\Models\SetorEscola;
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

        $data = [
            'local' => $local ? $local->desc : 'N/A',
            'setor' => $setor ? $setor->desc : 'N/A',
            'tipo' => $equipamento->id_tipos_equipamentos,
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

    $data = [
        'local' => $equipamento->local->desc ?? 'Local não definido',
        'setor' => $equipamento->setor->desc ?? 'Setor não definido',
        'tombamento' => $equipamento->tombamento,

    ];

    $pdf = FacadePdf::loadView('protocolo-entrada.pdf', $data);
    return $pdf->stream('protocolo-entrada.pdf');
}

}


