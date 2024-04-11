<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InservivelController extends Controller
{
    public function index () {
        return view('inservivel.index');
    }

    public function create() {
        return view('inservivel.create');
    }
}
