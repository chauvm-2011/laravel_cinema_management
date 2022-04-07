<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListMovieUserController extends Controller
{
    public function listMovieUser()
    {
        if (Auth::check() || Auth::viaRemember()) {
            return redirect()->route('list-movie-user-login');
        } else {
            return view('user.list_movie_user', [
                'movies' => Movie::query()->paginate(5),
                'categories' => Category::query()->get(),
            ]);
        }
    }
}
