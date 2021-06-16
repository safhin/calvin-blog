<?php

namespace App\Repository;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

interface ICategoryRepository{
    
    public function createCategory($data);

    public function all(): Collection;
    
    public function updateCategory($id, array $arguments);

    public function findById($id);

    public function getSlug($slug);

    public function categoryPost($id);

    public function destroy($id);
}