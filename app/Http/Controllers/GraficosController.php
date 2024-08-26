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
            ->select(DB::raw('MONTH(data_entrada) as mes'), DB::raw('count(*) as total'))
            ->where('id_status', 5)
            ->groupBy(DB::raw('MONTH(data_entrada)'))
            ->pluck('total', 'mes')
            ->toArray();

        // $equipamentosInserviveis = Equipamentos::with('status')->where()->get();


            // dd($equipamentosInserviveis );
            $dadosPorMes = array_fill(1, 12, 0);
        foreach ($equipamentosInserviveis as $mes => $total) {
            $dadosPorMes[$mes] = $total;
        }
        return view('graficos.inserviveis', compact('dadosPorMes'));
    }

    public function participacoes()
    {
        $usuarios = User::where('id_funcoes', 2)->get();
        return view('graficos.participacoes', compact('usuarios'));
    }
}
