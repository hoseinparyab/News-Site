<?php
namespace PYB\User\Providers;

use PYB\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use PYB\User\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'User');
        Route::middleware('web')->namespace('PYB\User\Http\Controllers')->group(__DIR__ . '/../Routes/user_routes.php');
        Gate::policy(User::class, UserPolicy::class);
        Factory::guessFactoryNamesUsing(static function (string $name) {
            return 'PYB\User\Database\Factories\\' . class_basename($name) . 'Factory';
        });

    }
    public function boot()
    {
        $this->app->booted(static function () {
            config()->set('panelConfig.menus.users', [
                'url'   => route('users.index'),
                'title' => 'کاربران ',
                'icon'  => 'account',
            ]);
        });
    }

}
