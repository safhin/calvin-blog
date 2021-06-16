<?php

namespace App\ViewModels;

use App\Services\ICommentService;

class CommentViewModel{
    protected $commentService;

    public function __construct(ICommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function getAllComments()
    {
        return $this->commentService->getAllComments();
    }

    public function createComment($data, $id)
    {
        return $this->commentService->createComment($data, $id);
    }
}