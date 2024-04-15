<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraficosController extends Controller
{
    public function anual()
    {
        return view('graficos.anual');
    }

    public function inserviveis()
    {
        return view('graficos.inserviveis');
    }

    public function participacoes()
    {
        return view('graficos.participacoes');
    }
}
