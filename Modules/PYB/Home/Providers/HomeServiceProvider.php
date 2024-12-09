<?php
namespace PYB\Home\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class HomeServiceProvider  extends ServiceProvider
{
    public function register ()
    {

        Route::middleware('web')->namespace('PYB\Home\Http\Controllers')->group(__DIR__ . '/../Routes/home_routes.php');
    }

    // public function boot ()
    // {
    //     dd('Home Service Provider Boot');
    // }
}
