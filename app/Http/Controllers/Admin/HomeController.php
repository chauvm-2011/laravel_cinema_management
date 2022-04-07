<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function showHomeForm()
    {
        return view('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
