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

    public function getAll()
    {
        return Category::orderbyDesc('id')->get();
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

    public function update($request, $category) :bool
    {
        $category->name = (string) $request->input('name');
        $category->description = (string) $request->input('description');
        if ($request->input('category_id') != $category->id) {
            $category->category_id = (int) $request->input('category_id');
        }
        $category->save();

        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $category = Category::where('id', $id)->first();
        if ($category) {
            return Category::where('id', $id)->orwhere('category_id', $id)->delete();
        }

        return false;
    }
}
