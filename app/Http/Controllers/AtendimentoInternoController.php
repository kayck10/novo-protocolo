<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\User;
use Illuminate\Http\Request;

class AtendimentoInternoController extends Controller
{
    public function index () {
        return view('atendimentos-internos.index');
    }

    public function create () {
        $setores = Local::where('externo', 0)->get();
        $tecnicos = User::where('id_funcoes', 2)->get();
        return view('atendimentos-internos.create', compact('setores', 'tecnicos'));
    }

    public function store (Request $request) {

    }
}
