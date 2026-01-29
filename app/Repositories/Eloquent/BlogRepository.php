<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;

class BlogRepository
{
    public function getAll()
    {
        return Blog::with('category')->get();
    }

    public function findById($id)
    {
        return Blog::findOrFail($id);
    }

    public function create($data)
    {
        return Blog::create($data);
    }

    public function update($id, $data)
    {
        $blog = $this->findById($id);
        $blog->update($data);
        return $blog;
    }

    public function delete($id)
    {
        $blog = $this->findById($id);
        return $blog->delete();
    }
}
