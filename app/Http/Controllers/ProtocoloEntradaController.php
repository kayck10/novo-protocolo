<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Local;
use DateTime;
use Illuminate\Http\Request;

class ProtocoloEntradaController extends Controller
{
    public function index () {
        return view('protocolo-entrada.index');
    }

    public function create() {
        $escolas = Local::all();
        return view('protocolo-entrada.create', compact('escolas'));
    }

    public function store (Request $request) {
        $local = Local::find($request->input('local'));
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
        $data_entrada = $request->data;

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

            return response()->json($errors, 503);
        } else {
            // Se a criação foi bem-sucedida, formata a data
            $data_formatada = $data->format('y/m/d');
        }

        $protocolos = Equipamentos::create([
            'local' => $request->input('local'),
            'data' => $request->input('data'),
        ]);
    }
}
