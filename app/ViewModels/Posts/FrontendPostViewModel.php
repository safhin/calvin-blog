<?php

namespace App\ViewModels\Posts;

use App\Services\IPostService;

class FrontendPostViewModel{

    private $postService;
    public $stickyPost;
    public $nonStickyPost;

    public function __construct(IPostService $postService)
    {
        $this->postService = $postService;
    }


    public function getStickyPost()
    {
        return $this->postService->getStickyPost();
    }
    public function getNonStickyPost()
    {
        return $this->postService->getNonStickyPost();
    }

    public function loadModel()
    {
        $this->stickyPost = $this->postService->getStickyPost();
        $this->nonStickyPost = $this->postService->getNonStickyPost();
    }


}