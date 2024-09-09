<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use App\Models\Local;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class AtendimentoEscolasController extends Controller
{
    public function index()
    {
        $escolas = Local::where('externo', 1)->orderBy('desc')->get();
        $eventos = Atendimentos::where('id_status', 3)->orWhere('id_user', null)->get();
        $usuarios = User::where('id_funcoes', 2)->get();

        return view('atendimento-escolas.index', compact('escolas', 'eventos', 'usuarios'));
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



        $data_entrada = $request->data_entrada;

        foreach ($meses_traducao as $pt => $en) {
            if (strpos($data_entrada, $pt) !== false) {
                $data_entrada = str_replace($pt, $en, $data_entrada);
                break;
            }
        }
        $data = DateTime::createFromFormat('j F, Y', $data_entrada);
        $prioridade =  (int) $request->prioridade;


        if ($data === false) {
            $errors = DateTime::getLastErrors();
            return response()->json(["error" => true, "message" => "Informe uma data válida!"], 400);
        } else {
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
    public function finalize(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:atendimentos,id',
            'id_user' => 'required|exists:users,id',
            'solucao' => 'required|string',
        ]);

        $atendimento = Atendimentos::findOrFail($request->id);
        $atendimento->id_user = $request->id_user;
        $atendimento->solucao = $request->solucao;
        $atendimento->id_status = 3;
        $atendimento->save();

        return response()->json($atendimento, 200);
    }
    public function delete (Request $request) {
        $request -> validate([
            'id' => 'required|exists:atendimentos,id',
        ]);
        $atendimento = Atendimentos::findOrFail($request->id);
        $atendimento->delete();

        return response()->json(['message' => 'Atendimento excluído com sucesso!'], 200);
    }
}
