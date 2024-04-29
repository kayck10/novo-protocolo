<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class ProtocoloEntradaController extends Controller
{
    public function index () {
        return view('protocolo-entrada.index');
    }

    public function create() {
        $escolas = Local::all();
        return view('protocolo-entrada.create', compact('escolas'));
    }
}
