<?php

namespace App\Services;


interface ICategoryService{

    public function getAllCategories();

    public function createCategory($data);

    public function updateCategory($id, array $arguments);

    public function findById($id);

    public function getSlug($slug);

    public function categoryPost($id);

    public function deleteCategory($id);
    
}