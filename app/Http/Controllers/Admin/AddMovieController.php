<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMoviePostRequest;
use App\Http\Services\MovieService;

class AddMovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function showAddMovieForm()
    {
        return view('admin.add_movie', [
            'categories' => $this->movieService->getCategory(),
        ]);
    }

    public function postAddMovie(AddMoviePostRequest $request)
    {
        $result = $this->movieService->create($request);

        return redirect()->route('list_movie')->with('message', 'Add movie successfully!');
    }
}
