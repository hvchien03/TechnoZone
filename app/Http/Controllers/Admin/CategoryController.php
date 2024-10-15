<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $_categoryService)
    {
        $this->categoryService = $_categoryService;
    }

    // List all categories
    public function index()
    {
        $categories = $this->categoryService->getAllCate();
        return view('admin.category.index', compact(var_name: 'categories'));
    }

    // Show create category form
    public function create()
    {
        if (request()->isMethod('get')) {
            return view('admin.category.create');
        } else if (request()->isMethod('post')) {
            $request = app(CategoryRequest::class);
            $data = $request->validated();

            try {
                $this->categoryService->createCategory($data);
                return redirect()->route('categories.index')->with('success', 'Category created successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    // Show the edit form for a specific category
    public function update($id)
    {
        if (request()->isMethod('get')) {
            $categories = $this->categoryService->getCateById($id);
            return view('admin.category.update', compact('categories'));
        } else if (request()->isMethod('put')) {
            $request = app(CategoryRequest::class);
            $data = $request->validated();

            try {
                $this->categoryService->updateCategory($id, data: $data);
                return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    // Delete a category
    public function delete($id)
    {
        try {
            $this->categoryService->deleteCategory($id);

            // Check if the request is an AJAX request
            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Category deleted successfully!']);
            }

            return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}