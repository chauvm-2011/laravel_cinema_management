<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class DetailMovieUserLoginController extends Controller
{
    public function detailMovieUserLogin(Movie $movie)
    {
        return view('user.detail_movie_user_login', [
            'movie' => $movie
        ]);
    }
}
