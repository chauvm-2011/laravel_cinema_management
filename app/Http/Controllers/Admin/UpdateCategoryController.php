<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryPostRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateCategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function showUpdateCategoryForm(Category $category)
    {
        return view('admin.update_category', [
            'category' => $category,
            'categories' => $this->categoryService->getParent(),
        ]);
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $result = $this->categoryService->update($request, $category);

        return redirect()->route('list_category')->with('message', 'Update sucessfully!');
    }
}
