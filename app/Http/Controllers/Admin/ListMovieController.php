<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListMovieController extends Controller
{
    public function showListMovieForm()
    {
        return view('admin.list_movie');
    }
}
