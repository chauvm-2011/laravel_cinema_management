<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\MovieService;
use App\Models\Movie;
use Illuminate\Http\Request;

class DetailMovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function showDetailMovieForm(Movie $movie)
    {
        return view('admin.detail_movie', [
            'movie' => $movie,
            'movies' => $this->movieService->getAll(),
        ]);
    }
}
