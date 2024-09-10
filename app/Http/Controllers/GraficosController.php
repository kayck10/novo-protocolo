<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use App\Models\Equipamentos;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{
    public function anual()
    {
        // Consertos de Equipamentos
        $equipamentosConsertados = Equipamentos::select(DB::raw('MONTH(created_at) as mes'), DB::raw('count(*) as total'))
            ->where('id_status', 4)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'mes')
            ->toArray();

        $dadosPorMesConsertos = array_fill(1, 12, 0);
        foreach ($equipamentosConsertados as $mes => $total) {
            if (!empty($mes)) {
                $dadosPorMesConsertos[$mes] = $total;
            }
        }

        // Atendimento Externo
        $atendimentoExterno = Atendimentos::select(DB::raw('MONTH(created_at) as mes'), DB::raw('count(*) as total'))
            ->where('externo', 1)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'mes')
            ->toArray();

        $dadosPorMesExterno = array_fill(1, 12, 0);
        foreach ($atendimentoExterno as $mes => $total) {
            if (!empty($mes)) {
                $dadosPorMesExterno[$mes] = $total;
            }
        }

        // Atendimento Interno
        $atendimentoInterno = Atendimentos::select(DB::raw('MONTH(created_at) as mes'), DB::raw('count(*) as total'))
            ->where('externo', 0)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'mes')
            ->toArray();

        $dadosPorMesInterno = array_fill(1, 12, 0);
        foreach ($atendimentoInterno as $mes => $total) {
            if (!empty($mes)) {
                $dadosPorMesInterno[$mes] = $total;
            }
        }

        return view('graficos.anual', compact('dadosPorMesConsertos', 'dadosPorMesExterno', 'dadosPorMesInterno'));
    }


    public function inserviveis()
    {
        $equipamentosInserviveis = Equipamentos::with('status')
            ->select(DB::raw('MONTH(created_at) as mes'), DB::raw('YEAR(created_at) as ano'), DB::raw('count(*) as total'))
            ->where('id_status', 6)
            ->groupBy(DB::raw('MONTH(created_at)'), DB::raw('YEAR(created_at)'))
            ->get()
            ->groupBy('ano');

        $dadosPorAno = [];

        foreach ($equipamentosInserviveis as $ano => $dados) {
            $dadosPorMes = array_fill(1, 12, 0);
            foreach ($dados as $dado) {
                $dadosPorMes[$dado->mes] = $dado->total;
            }
            $dadosPorAno[$ano] = $dadosPorMes;
        }
        return view('graficos.inserviveis', compact('dadosPorAno'));
    }


    public function participacoes()
    {
        $usuarios = User::where('id_funcoes', 2)->pluck('id', 'name');

        $equipamentoParticipacoes = Equipamentos::whereIn('id_users', $usuarios->keys())
            ->select('id_users', DB::raw('count(*) as total_participacoes'))
            ->groupBy('id_users')
            ->get();

        $atendimentos = Atendimentos::whereIn('id_user', $usuarios->keys())
            ->select('id_user', DB::raw('count(*) as total_atendimentos'))
            ->groupBy('id_user')
            ->get();

        $equipamentoArray = $equipamentoParticipacoes->keyBy('id_users')->map(function ($item) {
            return $item->total_participacoes;
        });

        $atendimentosArray = $atendimentos->keyBy('id_user')->map(function ($item) {
            return $item->total_atendimentos;
        });

        $usuariosDados = $usuarios->map(function ($name, $id) use ($equipamentoArray, $atendimentosArray) {
            return [
                'name' => $name,
                'total_participacoes' => $equipamentoArray->get($id, 0),
                'total_atendimentos' => $atendimentosArray->get($id, 0),
            ];
        })->values();

        return view('graficos.participacoes', compact('usuariosDados'));
    }


}
