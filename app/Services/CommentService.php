<?php

namespace App\Services;

use App\Repository\ICommentRepository;

class CommentService implements ICommentService{

    protected $commentRepository;

    public function __construct(ICommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function getAllComments()
    {
        return $this->commentRepository->all();
    }

    public function createComment($data, $id)
    {
        return $this->commentRepository->createComment($data, $id);
    }
}