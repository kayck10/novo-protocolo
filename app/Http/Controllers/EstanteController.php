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
        $ativos = Equipamentos::where('status', 1)->count();
        $emManutencao = Equipamentos::where('status', 2)->count();
        $inativos = Equipamentos::where('status', 3)->count();

        // Recupera todos os equipamentos
        $equipamentos = Equipamentos::all();

        // Recupera todos os usuários ativos (se necessário)
        $usuarios = User::where('id_situacao', 1)->orderBy('name', 'asc')->get();

        // Passa os dados para a view
        return view('estante.equipamentos', compact('equipamentos', 'usuarios', 'ativos', 'emManutencao', 'inativos'));
    }
}



