<?php

namespace App\Services;

interface ITagService{

    public function createTag($tag);

    public function updateTag($id, array $data);
    
    public function getAllTags();

    public function findById($id);
    
    public function deleteTag($id);
    
}