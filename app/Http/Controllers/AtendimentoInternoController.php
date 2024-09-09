<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use App\Models\Local;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use DateTime;
use Illuminate\Http\Request;

class AtendimentoInternoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimentos::where('id_user', '!=', null)->with(['tecnico', 'setor'])->get();

        $tecnicos = User::where('id_funcoes', 2)->get();
        $setores = Local::where('externo', 0)->get();

        return view('atendimentos-internos.index', compact('atendimentos', 'tecnicos', 'setores'));
    }

    public function create()
    {
        $setores = Local::where('externo', 0)->get();
        $tecnicos = User::where('id_funcoes', 2)->get();
        return view('atendimentos-internos.create', compact('setores', 'tecnicos'));
    }

    public function store(Request $request)
    {


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



        $data_entrada = $request->data;

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

        $atendimentos = Atendimentos::create([
            'id_user' => $request->id_user,
            'id_local' => $request->id_local,
            'data' => $data_formatada,
            'externo' => 0,
            'desc_problema' => $request->desc_problema,
            'solucao' => $request->solucao
        ]);
        Toastr::success('Atendimento Cadastrado com sucesso!', 'Concluído!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    public function show($id)
    {
        $atendimento = Atendimentos::with(['tecnico', 'setor'])->findOrFail($id);
        $tecnicos = User::where('id_funcoes', 2)->get();
        $setores = Local::where('externo', 0)->get();
        return view('atendimentos-internos.show', compact('atendimento', 'tecnicos', 'setores'));
    }

    public function edit($id)
    {
        $atendimento = Atendimentos::with(['tecnico', 'setor'])->findOrFail($id);
        $tecnicos = User::where('id_funcoes', 2)->get();
        $setores = Local::where('externo', 0)->get();
        return view('atendimentos-internos.edit', compact('atendimento', 'tecnicos', 'setores'));
    }

    public function update(Request $request, $id)
    {
        $atendimento = Atendimentos::find($id);
        $atendimento->update($request->all());
        Toastr::success('Atendimento atualizado com sucesso!', 'Concluído!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('atendimento-interno.index');
    }
    public function delete(Request $request, $id)
    {
        $atendimento = Atendimentos::findOrFail($id);
        $atendimento->delete();

        Toastr::success('Atendimento excluído com sucesso!', 'Concluído!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('atendimento-interno.index');
    }
}
