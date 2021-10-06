<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class ListCategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function showListCategoryForm(){
        return view('admin.list_category', [
            'categories' => $this->categoryService->getAll(),
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->categoryService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete successfully!',
            ]);
        }

        return response()->json([
            'error' => true,
        ]);
    }
}
