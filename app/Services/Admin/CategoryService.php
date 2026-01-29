<?php

namespace App\Services\Admin;

use App\Repositories\Eloquent\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    /**
     * Constructor to initialize CategoryRepository.
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all categories.
     */
    public function getAllCategories()
    {
        try {
            return $this->categoryRepository->getAll();
        } catch (\Exception $e) {
            throw new \Exception('Failed to fetch categories: ' . $e->getMessage());
        }
    }

    /**
     * Get a category by its ID.
     */
    public function getCategoryById($id)
    {
        try {
            return $this->categoryRepository->findById($id);
        } catch (\Exception $e) {
            throw new \Exception('Failed to fetch category: ' . $e->getMessage());
        }
    }

    /**
     * Create a new category.
     */
    public function createCategory($data)
    {
        try {
            return $this->categoryRepository->create($data);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create category: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing category.
     */
    public function updateCategory($data)
    {
        try {
            return $this->categoryRepository->update($data['category_id'], $data);
        } catch (\Exception $e) {
            throw new \Exception('Failed to update category: ' . $e->getMessage());
        }
    }

    /**
     * Delete a category by its ID.
     */
    public function deleteCategory($id)
    {
        try {
            return $this->categoryRepository->delete($id);
        } catch (\Exception $e) {
            throw new \Exception('Failed to delete category: ' . $e->getMessage());
        }
    }
}
