<?php

namespace PYB\Auth\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use PYB\Share\Http\Controllers\Controller;

class VerifyController extends Controller
{
    public function view()
    {
        return view('Auth::verify.email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return to_route('home.index');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return redirect()->back()->with(['message' => 'لینک تایید به ایمیل شما ارسال شد.']);
    }
}
