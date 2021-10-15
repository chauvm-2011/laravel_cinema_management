<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\CategoryMovie;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieService
{
    public function getCategory()
    {
        return Category::query()->get();
    }

    public function getListMovie()
    {
        return Movie::orderbyDesc('id')->get();
    }

    public function getAll()
    {
        return Movie::query()->get();
    }

    public function create($request)
    {
        try {
            DB::transaction(function () use ($request) {
                $data = $request->all();
                $movie = Movie::create([
                    'movie_name' => $data['movie_name'],
                    'description' => $data['description'],
                    'image' => $data['file'],
                    'time' => $data['time'],
                ]);
                foreach ($data['category_id'] as $value) {
                    CategoryMovie::create([
                        'movie_id' => $movie->id,
                        'category_id' => $value,
                    ]);
                }
            });
        } catch (\Exception $exception) {
            return response($exception);
        }
    }
}
