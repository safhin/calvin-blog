<?php

namespace App\Services;

interface ICommentService{

    public function getAllComments();

    public function createComment($data, $id);
}