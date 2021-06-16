<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $userModel = resolve('App\ViewModels\UserViewModel');
        $users = $userModel->getAllUsers();
        return view('backend.users')->with('users', $users);
    }

    public function show(Request $request)
    {
        $userModel = resolve('App\ViewModels\UserViewModel');
        $users = $userModel->getAllUsers();
        return view('backend.users.index',[
            'users' => $users,
        ]);
    }

    public function approve($user_id)
    {
        $userModel = resolve('App\ViewModels\UserViewModel');
        $user = $userModel->findUserById($user_id);
        $user->update(['approved_at' =>now()]);
        return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }

    public function destroy($id)
    {
        $userModel = resolve('App\ViewModels\UserViewModel');
        $userModel->deleteUser($id);
        return redirect()->back();
    }
}
