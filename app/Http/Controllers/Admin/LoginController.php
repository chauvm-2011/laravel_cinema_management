<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() || Auth::viaRemember()) {
            return redirect()->route('home');
        } else {
            return view('login');
        }
    }

    public function postLogin(LoginPostRequest $request)
    {
        if (Auth::attempt([
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ], $request->input('remember'))) {
            return redirect()->route('home');
        }

        return redirect()->route('login')->with('error', 'Email or password incorrect!');
    }
}
