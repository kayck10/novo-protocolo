<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtendimentoInternoController extends Controller
{
    public function index () {
        return view('atendimentos-internos.index');
    }

    public function create () {
        return view('atendimentos-internos.create');
    }
}
