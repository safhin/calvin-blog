<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repository\ITagRepository;
use App\Repository\IUserRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $postModel = resolve('App\ViewModels\Posts\PostViewModel');
        $userModel = resolve('App\ViewModels\UserViewModel');
        $postModel->loadModel();
        $users = $userModel->getAllUsers();

        return view('backend.main',[
            'posts' => $postModel,
            'users' => $users,
        ]);
    }


    public function approval()
    {
        return view('backend.auth.approval');
    }
}
