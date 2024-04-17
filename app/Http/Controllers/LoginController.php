<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create () {
        return view('login.login');
    }

    public function store (Request $request) {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return to_route('dashboard');
        }

    }
}
