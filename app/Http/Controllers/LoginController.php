<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.login');
    }


    public function store(Request $request)
    {
        $credentials = ['password' => $request->password];

        if (filter_var($request->login, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->login;
        } else {
            $credentials['usuario'] = $request->login;
        }

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            Toastr::error('Dados incorretos!', 'Erro');
            return redirect()->back();
        }
    }




    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Você saiu da sua conta.');
    }
}
