<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\User;
use Illuminate\Http\Request;

class EstanteController extends Controller
{
    public function index(Request $request)
    {
        // Contagem de equipamentos por status (você pode ajustar conforme suas necessidades)
        $ativos = Equipamentos::where('id_status', 1)->count();
        $emManutencao = Equipamentos::where('id_status', 2)->count();
        $inativos = Equipamentos::where('id_status', 3)->count();

        $equipamentos = Equipamentos::all();

        $usuarios = User::where('id_situacao', 1)->orderBy('name', 'asc')->get();

        return view('estante.index', compact('equipamentos', 'usuarios', 'ativos', 'emManutencao', 'inativos'));
    }
}



