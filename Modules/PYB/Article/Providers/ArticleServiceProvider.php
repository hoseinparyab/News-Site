<?php

namespace PYB\Article\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use PYB\Article\Models\Article;
use PYB\Article\Policies\ArticlePolicy;
use PYB\Role\Models\Permission;

class ArticleServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Article');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/article_routes.php');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../Resources/Lang/');


        Route::middleware('web')->namespace('PYB\Article\Http\Controllers')
            ->group(__DIR__ . '/../Routes/article_routes.php');
         Gate::policy(Article::class, ArticlePolicy::class);
    }
    public function boot()
    {
        config()->set('panelConfig.menus.articles', [
            'url'   => route('articles.index'),
            'title' => 'مقالات',
            'icon'  => 'book',
            'permissions' => [
                Permission::PERMISSION_ARTICLES
            ]
        ]);
    }
}
