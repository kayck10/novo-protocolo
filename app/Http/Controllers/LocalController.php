<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function create() {
        $escolas = Local::all();
        return view('locais.escolas', compact('escolas'));
    }
}
