<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $forntendPostModel = resolve('App\ViewModels\Posts\FrontendPostViewModel');
        $forntendPostModel->loadModel();
        return view('frontend.main',[
            'forntendPostModel' => $forntendPostModel
        ]);
    }

    public function singlePost($slug)
    {
        $postModel = resolve('App\ViewModels\Posts\SInglePostViewModel');
        $nextAndPerviousPostmodel = resolve('App\ViewModels\Posts\NextAndPreviousPostViewModel');
        $postModel->loadModel($slug);
        $nextAndPerviousPostmodel->loadModel($postModel->singlePost->id);
        return view('frontend.post',[
            'post' => $postModel,
            'nextAndPerviousPostmodel' => $nextAndPerviousPostmodel,
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}
