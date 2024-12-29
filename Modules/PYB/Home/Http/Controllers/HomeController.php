<?php

namespace PYB\Home\Http\Controllers;

use PYB\Home\Repositories\HomeRepo;
use App\Http\Controllers\Controller;
use PYB\Category\Repositories\CategoryRepo;

class HomeController extends Controller
{
    public function index(HomeRepo $homeRepo)
    {
        return view('Home::index', compact(['homeRepo']));
    }
}
