<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use App\Models\Equipamentos;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $inserviveisCount = Equipamentos::where('id_status', 6,)->count();
        $finalizados = Equipamentos::where('id_status', 3,)->count();
        $externo = Atendimentos::where('externo', 0,)->count();
        $interno = Atendimentos::where('externo', 1,)->count();

        return view('dashboard.index', compact('inserviveisCount', 'finalizados', 'interno', 'externo'));
    }

}
