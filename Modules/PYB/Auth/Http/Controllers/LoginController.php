<?php

namespace PYB\Auth\Http\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function view()
    {
        return view('Auth::login');
    }

    public function register()
    {
        // Store user data in the database
    }
}
