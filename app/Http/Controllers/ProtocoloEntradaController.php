<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\Local;
use App\Models\ProtocoloEntrada;
use App\Models\SetorEscola;
use App\Models\TiposEquipamentos;
use DateTime;
use Illuminate\Http\Request;
\Carbon\Carbon::setLocale('pt_BR');


class ProtocoloEntradaController extends Controller
{
    public function index()
    {
        $protocolos = ProtocoloEntrada::with('local')->orderBy('data_entrada', 'DESC')->get();
        $locais = Local::whereHas('protocoloEntrada')->distinct()->get();
        return view('protocolo-entrada.index', compact('protocolos', 'locais'));
    }

    public function getProtocolo($id)
    {
        $protocolo = ProtocoloEntrada::with(['equipamentos.status', 'equipamentos.user'])->find($id);

        if (!$protocolo) {
            return response()->json(['message' => 'Protocolo não encontrado'], 404);
        }

        return response()->json($protocolo);
    }

    public function create()
    {
        $tiposequipamentos = TiposEquipamentos::all();
        $setorEscolas = SetorEscola::all();
        $protocolos = Equipamentos::all();
        $escolas = Local::all();
        return view('protocolo-entrada.create', compact('escolas', 'protocolos', 'setorEscolas', 'tiposequipamentos'));
    }

    public function store(Request $request)
    {
        $data = $request->all();


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

        $data_entrada = $request->data_entrada;

        foreach ($meses_traducao as $pt => $en) {
            if (strpos($data_entrada, $pt) !== false) {
                $data_entrada = str_replace($pt, $en, $data_entrada);
                break;
            }
        }

        $hora_entrada = $request->hora_entrada ?? date('H:i:s');

        $data_completa = $data_entrada . ' ' . $hora_entrada;

        $data = DateTime::createFromFormat('j F, Y H:i:s', $data_completa);

        if ($data === false) {
            $errors = DateTime::getLastErrors();
            return response()->json(["error" => true, "message" => "Informe uma data válida!"], 400);
        } else {
            $data_formatada = $data->format('Y-m-d H:i:s');
        }

        $protocolo = ProtocoloEntrada::create([
            'id_local' => $request->input('local'),
            'data_entrada' => $data_formatada,
        ]);
        $data = $request->all();


        return response()->json($protocolo->id, 201);
    }


    public function equipamentos(Request $request)
    {
        $equipamentos = Equipamentos::create([
            'id_protocolo' => $request->id_protocolo,
            'tombamento' => $request->tombamento,
            'id_setor_escolas' => $request->input('setor'),
            'id_tipos_equipamentos' => $request->input('equipamentos'),
            'desc' => $request->input('desc'),
            'acessorios' => $request->descricao_acessorio,
            'prioridade' => $request->input('prioridade') ? 1 : 0,
            'id_status' => 1,
            'faltamPecas' => $request->faltamPecas,

        ]);

        return response()->json($equipamentos, 201);
    }

    public function destroy($id)
    {
        $protocolo = ProtocoloEntrada::find($id);

        if ($protocolo) {
            $protocolo->equipamentos()->delete();

            $protocolo->delete();

            return redirect()->route('index.protocolo')->with('success', 'Protocolo excluído com sucesso.');
        } else {
            return redirect()->route('index.protocolo')->with('error', 'Protocolo não encontrado.');
        }
    }

    public function destroyEquipamento($id)
    {
        $equipamento = Equipamentos::find($id);

        if ($equipamento) {
            $equipamento->delete();

            return response()->json(['message' => 'Equipamento excluído com sucesso!'], 200);
        }

        return response()->json(['message' => 'Equipamento não encontrado!'], 404);
    }
}
