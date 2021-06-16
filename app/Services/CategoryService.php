<?php

namespace App\Services;

use App\Repository\ICategoryRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CategoryService implements ICategoryService{

    private $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->all();
    }

    public function createCategory($category)
    {
        $result = $this->categoryRepository->createCategory([
            'cat_name' => $category['cat_name'],
            'cat_url' => $category['cat_url'],
        ]);
        return $result;
    }

    public function updateCategory($id, array $arguments)
    {
        $category = $this->categoryRepository->updateCategory($id,[
            'cat_name' => $arguments['cat_name'],
            'cat_url' => $arguments['cat_url'],
        ]);
        DB::commit();
        return $category;
    }

    public function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function getSlug($slug)
    {
        return $this->categoryRepository->getSlug($slug);
    }

    public function categoryPost($id)
    {
        return $this->categoryRepository->categoryPost($id);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->destroy($id);
    }
}