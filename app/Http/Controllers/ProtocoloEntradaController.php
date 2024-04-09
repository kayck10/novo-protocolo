<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProtocoloEntradaController extends Controller
{
    public function index () {
        return view('protocolo-entrada.index');
    }

    public function create() {
        return view('protocolo-entrada.create');
    }
}
