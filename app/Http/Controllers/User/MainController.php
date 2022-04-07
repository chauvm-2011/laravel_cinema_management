<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function showMainUserForm(Movie $movie)
    {
        if (Auth::check() || Auth::viaRemember()) {
            return redirect()->route('main-login');
        } else {
            return view('user.main', [
                'movies' => Movie::query()->get(),
            ]);
        }
    }
}
