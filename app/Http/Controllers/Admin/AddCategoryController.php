<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryPostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\CategoryService;

class AddCategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function showAddCategoryForm()
    {
        return view('admin.add_category', [
            'categories' => $this->categoryService->getParent(),
        ]);
    }

    public function postAddCategory(AddCategoryPostRequest $request)
    {
        $result = $this->categoryService->create($request);

        return redirect()->route('list_category')->with('message', 'Add category successfully!');
    }
}
