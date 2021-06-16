<?php

namespace App\ViewModels;

use App\Services\ICategoryService;

class CategoryViewModel{

    private $categoryService;
    public $allCategories;
    public $categoryById;

    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAllCategories()
    {
        return $this->categoryService->getAllCategories();
    }

    public function loadModel()
    {
        $this->allCategories = $this->getAllCategories();
    }

    public function createCategory($category)
    {
        return $this->categoryService->createCategory($category);
    }

    public function updateCategory($id, array $arguments)
    {
        return $this->categoryService->updateCategory($id, $arguments);
    }
    
    public function deleteCategory($id)
    {
        return $this->categoryService->deleteCategory($id);
    }
}