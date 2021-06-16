<?php

namespace App\ViewModels\Categories;

use App\Services\ICategoryService;

class CategoryPostViewModel{

    private $categoryService;
    public $categoryPost;

    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function categoryPost($id)
    {
        return $this->categoryService->categoryPost($id);
    }

    public function loadModel($id)
    {
        $this->categoryPost = $this->categoryPost($id);
    }
}