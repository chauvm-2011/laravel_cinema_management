<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddMovieController extends Controller
{
    public function showAddMovieForm(){
        return view('admin.add_movie');
    }

    public function postAddMovie(Request  $request)
    {

    }
}
