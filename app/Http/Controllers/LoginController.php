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

    public function teste(Request $request)
    {

        return response()->json(['error' => false,'message' => $request->evento]);
    }

    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        } else {
            Toastr::error('Dados incorretos!', 'Erro');
            return redirect()->back();
        }
    }
    public function logout(Request $request)
{
    Auth::logout();
    return redirect()->route('login')->with('message', 'Você saiu com sucesso.');
}

}
