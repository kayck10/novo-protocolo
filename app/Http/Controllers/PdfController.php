<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Problema;
use App\Models\ProtocoloEntrada;
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

        $protocolo = ProtocoloEntrada::find($equipamento->id_protocolo);

        if (!$protocolo) {
            return response()->json(['error' => 'Protocolo não encontrado'], 404);
        }

        $problema = Problema::find($request->id_problema);

        $data = [
            'local' => $protocolo->id_local,
            'setor' => $equipamento->id_setor_escolas,
            'tipo' => $equipamento->id_tipos_equipamentos,
            'solucao' => $equipamento->solucao,
            'num_patrimonio' => $equipamento->tombamento,
            'problema' => $problema,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'num_serie' => $request->num_serie,
        ];

        // Gere o PDF usando os dados coletados
        $pdf = FacadePdf::loadView('inservivel.pdf', $data);
        return $pdf->stream('inservivel.pdf');
    }
}

