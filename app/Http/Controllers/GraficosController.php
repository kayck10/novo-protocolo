<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{
    public function anual()
    {
        return view('graficos.anual');
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
        $usuarios = User::where('id_funcoes', 2)->get();
        return view('graficos.participacoes', compact('usuarios'));
    }
}
