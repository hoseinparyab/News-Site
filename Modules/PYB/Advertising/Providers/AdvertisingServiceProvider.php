<?php

namespace PYB\Advertising\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AdvertisingServiceProvider extends ServiceProvider
{
    public string $namespace = 'PYB\Advertising\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Advs');
        Route::middleware('web')->namespace($this->namespace)
            ->group(__DIR__ . '/../Routes/advertising_routes.php');
        Gate::policy(Advertising::class, AdvertisingPolicy::class);
    }

    public function boot()
    {
        config()->set('panelConfig.menus.advertisings', [
            'url'   => route('advertisings.index'),
            'title' => 'تبلیغات',
            'icon'  => 'file',
        ]);
    }
}
