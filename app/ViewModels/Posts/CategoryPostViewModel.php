<?php

namespace App\ViewModels\Posts;

use App\Services\IPostService;

class CategoryPostViewModel{

    protected $postService;
    public $categoryPost;


    public function __construct(IPostService $postService)
    {
        $this->postService = $postService;
    }

    public function getCategoryPost($id)
    {
        return $this->categoryService->getCategoryPost($id);
    }

    public function loadModel($id)
    {
        $this->categoryPost = $this->getCategoryPost($id);
    }

}