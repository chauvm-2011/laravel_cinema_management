<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailMovieUserLoginController extends Controller
{
    public function detailMovieUserLogin(Movie $movie)
    {
        if (Auth::check() || Auth::viaRemember()) {
            return view('user.detail_movie_user_login', [
                'movie' => $movie,
                'rooms' => Room::query()->get(),
            ]);
        } else {
            return redirect()->route('main');
        }
    }
}
