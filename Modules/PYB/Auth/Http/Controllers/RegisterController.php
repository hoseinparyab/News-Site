<?php

namespace PYB\Auth\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use PYB\Auth\Http\Requests\RegisterRequest;
use PYB\Auth\Services\RegisterService;
use PYB\Share\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function view()
    {
        return view('Auth::register');
    }

    public function register(RegisterRequest $request, RegisterService $registerService)
    {
        $user = $registerService->generateUser($request);

        auth()->loginUsingId($user->id);

        event(new Registered($user));

        return redirect()->route('home.index');
    }
}
