<?php

namespace App\Http\Services;

use App\Models\Category;
use \Illuminate\Support\Facades\Session;

class CategoryService
{
    public function getParent()
    {
        return Category::where('category_id')->get();
    }

    public function create($request)
    {
        try {
            $data = $request->all();
            return Category::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'category_id' => $data['category_id'],
            ]);
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
    }
}
