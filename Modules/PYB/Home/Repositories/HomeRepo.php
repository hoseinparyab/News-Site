<?php

namespace PYB\Home\Repositories;

use PYB\Article\Models\Article;
use PYB\Category\Models\Category;
use PYB\Role\Models\Permission;
use PYB\User\Models\User;

class HomeRepo
{
    public function vip_posts()
    {
        return Article::query()->where('status', Article::STATUS_ACTIVE)->whereType(Article::TYPE_VIP)->latest();

//        return Cache::remember('vip_posts', 2, function () {
//            return Article::query()
//                ->where('status', Article::STATUS_ACTIVE)
//                ->whereType(Article::TYPE_VIP)
//                ->latest();
//        });
    }

    public function getActiveCategories()
    {
        return Category::query()->whereStatus(Article::STATUS_ACTIVE)->latest()->get();
    }

    public function getVipArticlesOrderByView()
    {
        return Article::query()->where('status', Article::STATUS_ACTIVE)->whereType(Article::TYPE_VIP)
            ->orderByViews()->latest()->limit(5)->get();
    }

    public function getAuthorUsers()
    {
        return User::query()->permission(Permission::PERMISSION_AUTHORS)->limit(20)->get();
    }

    public function getArticlesOrderByView()
    {
        return Article::query()->where('status', Article::STATUS_ACTIVE)->whereType(Article::TYPE_NORMAL)
            ->orderByViews()->latest()->limit(3)->get();
    }

    public function getNewArticles()
    {
        return Article::query()->whereStatus(Article::STATUS_ACTIVE)->whereType(Article::TYPE_NORMAL)->latest()->limit(8)->get();
    }

    /**
     * Get the latest articles with select title columns.
     *
     * @return Article[]
     */
    public function getChapchinArticles()
    {
        return Article::query()
            ->select('title', 'slug')
            ->where('status', Article::STATUS_ACTIVE)
            ->latest()
            ->limit(5)
            ->get();
    }

    public function searchArticle(string $search)
    {
        return Article::query()
            ->where('title', 'LIKE', "%$search%")
            ->where('body', 'LIKE', "%$search%")
            ->get();
    }

}
