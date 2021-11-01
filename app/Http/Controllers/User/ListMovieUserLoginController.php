<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListMovieUserLoginController extends Controller
{
    public function listMovieUserLogin()
    {
        if (Auth::check() || Auth::viaRemember()) {
            return view('user.list_movie_user_login', [
                'movies' => Movie::query()->paginate(5),
                'categories' => Category::query()->get(),
            ]);
        } else {
            return redirect()->route('main');
        }
    }
}
