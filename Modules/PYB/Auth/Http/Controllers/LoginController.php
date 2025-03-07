<?php

namespace PYB\Auth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use PYB\Auth\Http\Requests\LoginRequest;
use PYB\Share\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function view()
    {
        return view('Auth::login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return to_route('home.index');
        }

        return redirect()->back()->withErrors(['data_problem' => 'اطلاعات درست نبوده!']);
    }
}

