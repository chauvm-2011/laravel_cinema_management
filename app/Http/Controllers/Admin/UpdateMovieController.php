<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMoviePostRequest;
use App\Http\Services\MovieService;
use App\Models\Movie;
use Illuminate\Http\Request;

class UpdateMovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }
    public function updateMovieForm(Movie $movie)
    {
        return view('admin.update_movie', [
            'movie' => $movie,
            'movies' => $this->movieService->getAll(),
            'categories' => $this->movieService->getCategory(),
        ]);
    }

    public function updateMovie(Movie $movie, UpdateMoviePostRequest $request)
    {
        $result = $this->movieService->update($request, $movie);

        return redirect()->route('list_movie')->with('message', 'Update movie successfully!');
    }
}
