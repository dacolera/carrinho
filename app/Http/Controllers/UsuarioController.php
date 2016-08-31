<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect('/produtos/listagem');
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
