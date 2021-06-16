<?php

namespace App\ViewModels\Posts;

use App\Services\IPostService;

class NextAndPreviousPostViewModel{

    private $postService;
    public $nextPost;
    public $previousPost;

    public $slug;


    public function __construct(IPostService $postService)
    {
        $this->postService = $postService;
    }

    public function getNextPost($id)
    {
        return $this->postService->getNextPost($id);
    }
    public function getPreviousPost($id)
    {
        return $this->postService->getPreviousPost($id);
    }
    

    public function loadModel($id)
    {
        $this->nextPost = $this->postService->getNextPost($id);
        $this->previousPost = $this->postService->getPreviousPost($id);
    }


}