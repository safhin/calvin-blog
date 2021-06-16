<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Http\Request;
use App\Traits\ImageUpload;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    use ImageUpload;
    
    public function showRegisterForm()
    {
        return view('backend.auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'user_image' => 'required|mimes:jpeg,jpg,png|max:10000',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'user_image' => 'image.jpg',
        ]);
        $user->password = bcrypt($user->password);
        if ($request->hasFile('user_image')) {

            $userImage = $request->file('user_image');
            $imageName = Str::slug($request->input('name')).'_'.time();
            $folder = '/avatar/';
            $filepath = $folder.$imageName.'.'.$userImage->getClientOriginalExtension();
            $this->imageUpload($userImage,$folder,'public',$imageName);
            $user->user_image = $filepath;
            $user->save();

        }
        $admin = User::where('admin', 1)->first();
        if ($admin) {
            $admin->notify(new NewUser($user));
        } 
        return redirect()->route('approval');
    }
}
