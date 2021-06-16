<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }
    
    public function login(Request $request)
    {
        $cridentials = $request->only('email','password');
        $remember = $request->input('remember');

        if (Auth::attempt($cridentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
