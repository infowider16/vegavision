<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Services\Admin\BlogService;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    protected $blogService;

    /**
     * BlogController constructor.
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of blogs.
     */
    public function index()
    {
        try {
            $blogs = $this->blogService->getAllBlogs();
            return view('admin.blog-list', compact('blogs'));
        } catch (\Exception $e) {
            Log::error('Error fetching blogs: ' . $e->getMessage(), ['exception' => $e]);
            return error_response('Failed to fetch blogs.', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        try {
            $categories = Category::all();
            return view('admin.blog-form', compact('categories'));
        } catch (\Exception $e) {
            Log::error('Error loading create blog form: ' . $e->getMessage(), ['exception' => $e]);
            return error_response('Failed to load create blog form.', $e->getMessage());
        }
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(BlogRequest $request)
    {
        try {
            $this->blogService->createBlog($request->validated());
            return success_response([], 'Blog created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating blog: ' . $e->getMessage(), ['exception' => $e]);
            return error_response('Failed to create blog.', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit($id)
    {
        try {
            $blog = $this->blogService->getBlogById($id);
            $categories = Category::all();
            return view('admin.blog-form', compact('blog', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error loading edit blog form: ' . $e->getMessage(), ['exception' => $e]);
            return error_response('Failed to load edit blog form.', $e->getMessage());
        }
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(BlogRequest $request, $id)
    {
        try {
            $this->blogService->updateBlog($id, $request->validated());
            return success_response([], 'Blog updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating blog: ' . $e->getMessage(), ['exception' => $e]);
            return error_response('Failed to update blog.', $e->getMessage());
        }
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy(Request $request)
    {
        try {

            $id = $request->input('id');
            $this->blogService->deleteBlog($id);
            return success_response([], 'Blog deleted successfully.');

        } catch (\Exception $e) {
            Log::error('Error deleting blog: ' . $e->getMessage(), ['exception' => $e]);
            return error_response('Failed to delete blog.', $e->getMessage());
        }
    }

    public function view($id)
    {
        try {
            $blog = $this->blogService->getBlogById($id);
            return view('admin.blog-view', compact('blog'));
        } catch (\Exception $e) {
            Log::error('Error loading edit blog form: ' . $e->getMessage(), ['exception' => $e]);
            return error_response('Failed to load edit blog form.', $e->getMessage());
        }
    }

}
