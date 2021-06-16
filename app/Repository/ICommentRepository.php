<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface ICommentRepository{

    public function all(): Collection;

    public function createComment($data, $id);
}