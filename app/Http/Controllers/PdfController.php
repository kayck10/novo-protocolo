<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Problema;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function gerarPDF(Request $request)
    {
        $equipamento = Equipamentos::find($request->id_equipamento);
        $problema = Problema::find($request->id_problema);

        $data = [
            'equipamento' => $equipamento,
            'problema' => $problema,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'num_serie' => $request->num_serie,
        ];

        $pdf = FacadePdf::loadView('inservivel.pdf', $data);
        return $pdf->stream('inservivel.pdf');
    }
}

