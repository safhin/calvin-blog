<?php

namespace App\Repository;
use Illuminate\Support\Collection;

interface ITagRepository{
    
    public function allTags(): Collection;

    public function findById($id);
     
    public function createTag($data);

    public function updateTag($id, array $data);

    public function destroy($id);
    
}