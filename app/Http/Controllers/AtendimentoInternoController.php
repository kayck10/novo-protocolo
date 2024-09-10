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
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_local' => 'required|exists:local,id',
            'data' => 'required|string',
            'desc_problema' => 'required|string',
            'solucao' => 'required|string',
        ], [
            'id_user.required' => 'O campo Técnico é obrigatório.',
            'id_user.exists' => 'O técnico selecionado não é válido.',
            'id_local.required' => 'O campo Setor é obrigatório.',
            'id_local.exists' => 'O setor selecionado não é válido.',
            'data.required' => 'O campo Data é obrigatório.',
            'data.string' => 'O campo Data deve ser uma string válida.',
            'desc_problema.required' => 'O campo Problema é obrigatório.',
            'desc_problema.string' => 'O campo Problema deve ser uma string válida.',
            'solucao.required' => 'O campo Solução é obrigatório.',
            'solucao.string' => 'O campo Solução deve ser uma string válida.',
        ]);

        // Tradução dos meses
        $meses_traducao = [
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
        ];

        $data_entrada = $request->data;

        foreach ($meses_traducao as $pt => $en) {
            if (strpos($data_entrada, $pt) !== false) {
                $data_entrada = str_replace($pt, $en, $data_entrada);
                break;
            }
        }

        $data = DateTime::createFromFormat('j F, Y', $data_entrada);
        if ($data === false) {
            return response()->json(["error" => true, "message" => "Informe uma data válida!"], 400);
        }

        $data_formatada = $data->format('Y-m-d');

        // Criar o atendimento
        Atendimentos::create([
            'id_user' => $request->id_user,
            'id_local' => $request->id_local,
            'data' => $data_formatada,
            'externo' => 0,
            'desc_problema' => $request->desc_problema,
            'solucao' => $request->solucao,
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
