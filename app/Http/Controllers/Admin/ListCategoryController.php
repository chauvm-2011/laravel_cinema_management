<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ListCategoryController extends Controller
{
    public function showListCategoryForm(){
        return view('admin.list_category', [
        ]);
    }

    public function getAll()
    {
        return Category::where('id')->get();
    }
}
