<?php
namespace PYB\Home\Providers;

use Illuminate\Support\ServiceProvider;


class HomeServiceProvider  extends ServiceProvider
{
    public function register ()
    {
        dd('Home Service Provider Register');

    }

    public function boot ()
    {
        dd('Home Service Provider Boot');
    }
}
