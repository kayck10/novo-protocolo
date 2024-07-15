<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Local;
use App\Models\ProtocoloEntrada;
use App\Models\SetorEscola;
use App\Models\TiposEquipamentos;
use Brian2694\Toastr\Facades\Toastr;
use DateTime;
use Illuminate\Http\Request;

class ProtocoloEntradaController extends Controller
{
    public function index()
    {
        $protocolos = ProtocoloEntrada::with('local')->get();
        $locais = Local::whereHas('protocoloEntrada')->distinct()->get();
        return view('protocolo-entrada.index', compact('protocolos', 'locais'));
    }

    public function getProtocolo($id)
    {
        $protocolo = ProtocoloEntrada::with('equipamentos')->find($id);

        if (!$protocolo) {
            return response()->json(['message' => 'Protocolo não encontrado'], 404);
        }

        return response()->json($protocolo);
    }




    public function create() {
       $tiposequipamentos = TiposEquipamentos::all();
        $setorEscolas = SetorEscola::all();
        $protocolos = Equipamentos::all();
        $escolas = Local::all();
        return view('protocolo-entrada.create', compact('escolas', 'protocolos', 'setorEscolas', 'tiposequipamentos'));
    }

    public function store (Request $request) {

        // dd($request->all());

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



        $protocolo = ProtocoloEntrada::create([
            'id_local' => $request->input('local'),
            'data_entrada' => $data_formatada,
        ]);


        return response()->json($protocolo->id, 201);
    }

    public function equipamentos (Request $request) {
        $equipamentos = Equipamentos::create([
            'id_protocolo' => $request->id_protocolo,
            'tombamento' => $request->tombamento,
            'id_setor_escolas' => $request->input('setor'),
            'id_tipos_equipamentos' => $request->input('equipamentos'),
            'desc' => $request->problema,
            'prioridade' => $request->prioridade == 'on' ? 1 : 0,
            'id_status' => 1
        ]);
        return response()->json($equipamentos, 201);
    }

    public function destroy ($id, Request $request) {
        $protocolos = ProtocoloEntrada::find($id);
        $protocolos->delete();
        return redirect()->back();
    }
}
