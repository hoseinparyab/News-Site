<?php

namespace PYB\Auth\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\ResetPassword;
use PYB\Auth\Http\Requests\PasswordUpdateRequest;
use PYB\Auth\Http\Requests\SendEmailPasswordRecoveryRequest;

class ResetController extends Controller
{
    public function view()
    {
        return view('Auth::password.send-email');
    }

    public function sendEmail(SendEmailPasswordRecoveryRequest $request)
    {
        $reset = Password::sendResetLink($request->only('email'));

        return $reset === Password::RESET_LINK_SENT ?
            back()->with(['message' => 'لینک بازیابی با موفقیت به ایمیل شما ارسال شد']) :
            back()->withErrors(['error' => 'یک مشکلی در سیستم به وجود امده لطفا دوباره تلاش کنید']);
    }

    public function reset(Request $request)
    {
        $token = $request->token;
        $email = $request->email;

        return view('Auth::password.reset', compact(['token', 'email']));
//        return view('Auth::password.reset', ['token' => $token]);
    }

    public function update(PasswordUpdateRequest $request)
    {
        $reset = Password::reset(
            $request->only('token', 'email', 'password', 'password_confirmation'),
            static function ($user, $password) {
                $user->forceFill(['password' => bcrypt($password)])->setRememberToken(Str::random(60));

                $user->save();

                event(new ResetPassword($user));
            }
        );

        dd($reset);
        return $reset === Password::PASSWORD_RESET ?
            to_route('login')->with(['success_reset_password' => 'رمز عبور شما با موفقیت تغییر کرد.']) :
            back()->withErrors(['error' => 'مشکلی در سیستم به وجود امده لطفا بعدا تلاش کنید.']);
    }
}
