<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $forntendPostModel = resolve('App\ViewModels\Posts\PostViewModel');
        $categoryModel = resolve('App\ViewModels\Categories\FrontendCategoryViewModel');
        $categoryPostModel = resolve('App\ViewModels\Categories\CategoryPostViewModel');
        $forntendPostModel->loadModel();
        
        $category = $categoryModel->getSlug($slug);
        $categoryPostModel->loadModel($category->id);
        return view('frontend.category',[
            'posts' => $categoryPostModel,
            'category' => $category,
        ]);
    }
}
