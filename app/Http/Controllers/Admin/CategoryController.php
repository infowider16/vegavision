<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\CategoryService;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    /**
     * Constructor to initialize CategoryService.
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        try {
            $categories = $this->categoryService->getAllCategories();
            return view('admin.category-list', compact('categories'));
        } catch (\Exception $e) {
            return error_response('Failed to fetch categories.', $e->getMessage());
        }
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $this->categoryService->createCategory($request->validated());
            return success_response([], 'Category created successfully.');
        } catch (\Exception $e) {
            return error_response('Failed to create category.', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit($id)
    {
        try {
            $category = $this->categoryService->getCategoryById($id);
            return view('admin.category-edit', compact('category'));
        } catch (\Exception $e) {
            return error_response('Failed to load edit category form.', $e->getMessage());
        }
    }

    /**
     * Update the specified category in storage.
     */
    public function update(CategoryRequest $request)
    {
        try {
            $this->categoryService->updateCategory($request->validated());
            return success_response([], 'Category updated successfully.');
        } catch (\Exception $e) {
            return error_response('Failed to update category.', $e->getMessage());
        }
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $this->categoryService->deleteCategory($request->category_id);
            return success_response([], 'Category deleted successfully.');
        } catch (\Exception $e) {
            return error_response('Failed to delete category.', $e->getMessage());
        }
    }
}
