<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstanteController extends Controller
{
    public function index () {
        return view('estante.index');
    }
}
