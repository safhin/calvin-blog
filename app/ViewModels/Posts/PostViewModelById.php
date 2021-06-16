<?php

namespace App\ViewModels\Posts;

use App\Services\IPostService;

class PostViewModelById{

    protected $postService;
    public $postById;

    public function __construct(IPostService $postService)
    {
        $this->postService = $postService;
    }

    public function getPostById($id)
    {
        return $this->postService->getPostById($id);
    }

    public function loadModel($id)
    {
        $this->postById = $this->getPostById($id);
    }

}
