<?php

namespace App\ViewModels;

use App\Services\ITagService;

class TagByIdViewModel{

    private $tagService;
    public $tagById;

    public function __construct(ITagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function findTagById($id)
    {
        return $this->tagService->findById($id);
    }

    public function loadModel($id)
    {
        $this->tagById = $this->findTagById($id);
    }
}