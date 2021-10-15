<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\MovieService;
use Illuminate\Http\Request;

class ListMovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }
    public function showListMovieForm()
    {
        return view('admin.list_movie', [
            'movies' => $this->movieService->getListMovie(),
        ]);
    }
}
