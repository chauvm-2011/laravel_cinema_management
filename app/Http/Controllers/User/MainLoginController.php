<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainLoginController extends Controller
{
    public function mainLoginUser()
    {
        if (Auth::check() || Auth::viaRemember()) {
            return view('user.main_login', [
                'movies' => Movie::query()->get(),
            ]);
        } else {
            return redirect()->route('main');
        }

    }
    public function signout()
    {
        Auth::logout();
        return redirect()->route('main');
    }
}
