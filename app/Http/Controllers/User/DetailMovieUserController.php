<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Http\Request;

class DetailMovieUserController extends Controller
{
    public function detailMovieUser(Movie $movie)
    {
        return view('user.detail_movie_user', [
            'movie' => $movie,
            'rooms' => Room::query()->get(),
        ]);
    }
}
