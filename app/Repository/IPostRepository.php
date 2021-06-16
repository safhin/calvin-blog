<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

interface IPostRepository{

    public function createPost($data);

    public function updatePost($id, array $data);

    public function all(): Collection;

    public function findById($id);

    public function getStickyPost();

    public function getNonStickyPost();

    public function getSinglePost($slug);

    public function getNextPost($id);

    public function getPreviousPost($id);

    public function destroy($id);
}