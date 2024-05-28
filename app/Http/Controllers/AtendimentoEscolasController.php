<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use App\Models\Local;
use DateTime;
use Illuminate\Http\Request;

class AtendimentoEscolasController extends Controller
{
    public function index()
    {
        $escolas = Local::where('externo', 1)->orderBy('desc')->get();
        $eventos = Atendimentos::all();
        return view('atendimento-escolas.index', compact('escolas', 'eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'local' => 'required|exists:local,id',
        ]);
        $meses_traducao = array(
            "Janeiro" => "January",
            "Fevereiro" => "February",
            "Março" => "March",
            "Abril" => "April",
            "Maio" => "May",
            "Junho" => "June",
            "Julho" => "July",
            "Agosto" => "August",
            "Setembro" => "September",
            "Outubro" => "October",
            "Novembro" => "November",
            "Dezembro" => "December"
        );



        // Recebe a entrada do request
        $data_entrada = $request->data_entrada;

        // Substitui o nome do mês em português pelo correspondente em inglês
        foreach ($meses_traducao as $pt => $en) {
            if (strpos($data_entrada, $pt) !== false) {
                $data_entrada = str_replace($pt, $en, $data_entrada);
                break; // Substitui apenas uma vez
            }
        }
        // Cria um objeto DateTime com a data corrigida
        $data = DateTime::createFromFormat('j F, Y', $data_entrada);
        $prioridade =  (int) $request->prioridade;
        // Verifica se a criação foi bem-sucedida


        if ($data === false) {
            // Se houver erro, mostra uma mensagem de erro
            $errors = DateTime::getLastErrors();
            return response()->json(["error" => true, "message" => "Informe uma data válida!"], 400);
        } else {
            // Se a criação foi bem-sucedida, formata a data
            $data_formatada = $data->format('y/m/d');
        }

        $atendimento = Atendimentos::create([
            'id_local' => $request->input('local'),
            'externo' => 1,
            'desc_problema' => $request->problema,
            'data' => $data_formatada

        ]);

        return response()->json($atendimento, 201);
    }
}
