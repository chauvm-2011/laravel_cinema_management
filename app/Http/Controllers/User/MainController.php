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
        return view('user.main', [
            'movies' => Movie::query()->get(),
        ]);
    }
}
