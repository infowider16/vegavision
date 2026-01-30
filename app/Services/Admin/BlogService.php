<?php

namespace App\Services\Admin;

use App\Repositories\Eloquent\BlogRepository;
use App\Traits\UploadImageTrait;
use Illuminate\Http\UploadedFile;

class BlogService
{
    use UploadImageTrait;

    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Get all blogs.
     *
     * @return mixed
     */
    public function getAllBlogs()
    {
        try {
            return $this->blogRepository->getAll();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Get a blog by its ID.
     *
     * @param int $id
     * @return mixed
     */
    public function getBlogById($id)
    {
        try {
            return $this->blogRepository->findById($id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Create a new blog.
     *
     * @param array $data
     * @return mixed
     */
    public function createBlog($data)
    {
        try {
            if (isset($data['cover_image']) && $data['cover_image'] instanceof UploadedFile) {
                $data['cover_image'] = $this->uploadImage($data['cover_image'], 'blogs');
            }

            return $this->blogRepository->create($data);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Update an existing blog.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function updateBlog($id, $data)
    {
        try {
          
            $existingBlog = $this->blogRepository->findById($id);
            if (isset($data['cover_image']) && $data['cover_image'] instanceof \Illuminate\Http\UploadedFile) {
               
                if (!empty($existingBlog->cover_image)) {
                    $this->deleteImage($existingBlog->cover_image);
                }

                $data['cover_image'] = $this->uploadImage($data['cover_image'], 'blogs');
            }

            return $this->blogRepository->update($id, $data);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Delete a blog by its ID.
     *
     * @param int $id
     * @return mixed
     */
    public function deleteBlog($id)
    {
        try {
            return $this->blogRepository->delete($id);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
