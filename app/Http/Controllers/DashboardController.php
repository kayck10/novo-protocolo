<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use App\Models\Equipamentos;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $emAberto = Equipamentos::where('id_status', 1,)->count();
        $emAndamento = Equipamentos::where('id_status', 2,)->count();
        $finalizados = Equipamentos::where('id_status', 3,)->count();
        $concluido = Equipamentos::where('id_status', 4,)->count();
        $inservivel = Equipamentos::where('id_status', 5,)->count();
        $inserviveisCount = Equipamentos::where('id_status', 6,)->count();
        $externo = Atendimentos::where('externo', 0,)->count();
        $interno = Atendimentos::where('externo', 1,)->count();

        return view('dashboard.index', compact( 'emAberto', 'emAndamento','finalizados', 'concluido', 'inservivel', 'inserviveisCount',  'interno', 'externo' ));
    }

}
