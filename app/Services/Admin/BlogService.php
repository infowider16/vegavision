<?php

namespace App\Services\Admin;

use App\Repositories\Eloquent\BlogRepository;

class BlogService
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getAllBlogs()
    {
        return $this->blogRepository->getAll();
    }

    public function getBlogById($id)
    {
        return $this->blogRepository->findById($id);
    }

    public function createBlog($data)
    {
        return $this->blogRepository->create($data);
    }

    public function updateBlog($id, $data)
    {
        return $this->blogRepository->update($id, $data);
    }

    public function deleteBlog($id)
    {
        return $this->blogRepository->delete($id);
    }
}
