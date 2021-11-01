<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class ListMovieUserController extends Controller
{
    public function listMovieUser()
    {
        return view('user.list_movie_user', [
            'movies' => Movie::query()->paginate(5),
            'categories' => Category::query()->get(),
        ]);
    }
}
