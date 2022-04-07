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
                    'link' => $data['link'],
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

    public function update($request, $movie)
    {
        try {
            DB::transaction(function () use ($request, $movie){
                $data = $request->all();
                $categoryMovie = CategoryMovie::where('movie_id', $movie->id)->first();
                if ($categoryMovie) {
                    CategoryMovie::where('movie_id', $movie->id)->delete();
                    $movie->update($request->all());
                    foreach ($data['category_id'] as $value) {
                        CategoryMovie::create([
                            'movie_id' => $movie->id,
                            'category_id' => $value,
                        ]);
                    }
                }
            });
        } catch (\Exception $exception) {
            return response($exception);
        }
    }

    public function delete($request)
    {
            $categoryMovie = CategoryMovie::where('movie_id', $request->input('id'))->first();
            if ($categoryMovie) {
                CategoryMovie::where('movie_id', $request->input('id'))->delete();
                $movie = Movie::where('id', $request->input('id'))->first();
                if ($movie) {
                    return Movie::where('id', $request->input('id'))->delete();
                }
            }

    }
}
