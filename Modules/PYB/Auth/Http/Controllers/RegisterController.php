<?php

namespace PYB\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use PYB\Auth\Services\RegisterService;
use PYB\Auth\Http\Requests\RegisterRequest;

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

        return redirect()->route('home.index');
    }
}

