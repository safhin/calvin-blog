<?php

namespace App\ViewModels\Posts;

use App\Services\IPostService;


class PostViewModel{

    private $postService;
    public $allPosts;


    public function __construct(IPostService $postService)
    {
        $this->postService = $postService;
    }

    public function getAllPost()
    {
        return $this->postService->getAllPost();
    }

    public function loadModel()
    {
        $this->allPosts = $this->postService->getAllPost();
    }

    public function createPost($post)
    {
        return $this->postService->createPost($post);
    }

    public function updatePost($post, $id)
    {
        return $this->postService->updatePost($post, $id);
    }

    public function deletePost($id)
    {
        return $this->postService->deletePost($id);
    }
}