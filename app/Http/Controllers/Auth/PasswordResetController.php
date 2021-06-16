<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function forgotPasswordform()
    {
        return view('backend.auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT ? 
                back()->with(['status' => __($status)]) 
                : back()->withErrors(['email' => __($status)]);
        return view('backend.auth.forgot-password');
    }

    public function resetPasswordForm($token)
    {
        return view('backend.auth.reset-password',['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function($user,$password) use ($request){
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status == Password::PASSWORD_RESET 
                ? redirect()->route('login')->with('status', __($status)) 
                : back()->withErrors(['email' => [__($status)]]);
    }
}
