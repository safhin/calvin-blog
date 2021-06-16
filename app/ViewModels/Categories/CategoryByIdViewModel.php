<?php

namespace App\ViewModels\Categories;

use App\Services\ICategoryService;

class CategoryByIdViewModel{

    private $categoryService;
    public $categoryById;

    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function loadModel($id)
    {
        $this->categoryById = $this->findCategoryById($id);
    }

    public function findCategoryById($id)
    {
        return $this->categoryService->findById($id);
    }

}