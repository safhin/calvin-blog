<?php

namespace App\ViewModels\Categories;

use App\Services\ICategoryService;

class FrontendCategoryViewModel{

    private $categoryService;
    public $allCategories;
    public $categoryById;
    public $categorySlug;
    public $id;

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
        $this->allCategories = $this->categoryService->getAllCategories();
    }

    public function categoryPost($id)
    {
        return $this->categoryService->categoryPost($id);
    }

    public function getSlug($slug)
    {
        return $this->categoryService->getSlug($slug);
    }
}