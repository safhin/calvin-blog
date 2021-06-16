<?php

namespace App\ViewModels\Posts;

use App\Services\IPostService;

class SInglePostViewModel{

    private $postService;
    public $singlePost;

    public function __construct(IPostService $postService)
    {
        $this->postService = $postService;
    }

    public function getSinglePost($slug)
    {
        return $this->postService->getSinglePost($slug);
    }
    

    public function loadModel($slug)
    {
        $this->singlePost = $this->getSinglePost($slug);
    }


}