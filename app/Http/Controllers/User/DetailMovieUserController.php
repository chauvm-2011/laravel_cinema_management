<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailMovieUserController extends Controller
{
    public function detailMovieUser(Movie $movie)
    {
        if (Auth::check() || Auth::viaRemember()) {
            return redirect()->route('detail-movie-user-login');
        } else {
            return view('user.detail_movie_user', [
                'movie' => $movie
            ]);
        }
    }
}
