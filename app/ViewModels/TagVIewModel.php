<?php

namespace App\ViewModels;

use App\Services\ITagService;

class TagViewModel{

    private $tagService;
    public $allTags;

    public function __construct(ITagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function getAllTags()
    {
        return $this->tagService->getAllTags();
    }


    public function loadModel()
    {
        $this->allTags = $this->tagService->getAllTags();
    }

    public function findTagById($id)
    {
        return $this->tagService->findById($id);
    }

    public function createTag($tag)
    {
        return $this->tagService->createTag($tag);
    }

    public function updateTag($data, $id)
    {
        return $this->tagService->updateTag($data, $id);
    }

    public function deleteTag($id)
    {
        return $this->tagService->deleteTag($id);   
    }
}