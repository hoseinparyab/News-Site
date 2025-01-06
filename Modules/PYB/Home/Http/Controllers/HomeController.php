<?php

namespace PYB\Home\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use PYB\Advertising\Models\Advertising;
use PYB\Advertising\Repositories\AdvertisingRepo;
use PYB\Article\Repositories\ArticleRepo;
use PYB\Home\Repositories\HomeRepo;
use PYB\Share\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(HomeRepo $homeRepo, AdvertisingRepo $advertisingRepo)
    {
//        dd(Storage::disk('local')->get('private/milwad.txt'));
//        dd(Storage::disk('local')->get('private/laravel-frame.png'));

        $adv_top = Cache::remember('top_advs', 2, function () use ($advertisingRepo) {
            return $advertisingRepo->getAdvByLocation(Advertising::LOCATION_TOP_MAIN_PAGE)->latest()->first();
        });
//        $adv_top = $advertisingRepo->getAdvByLocation(Advertising::LOCATION_TOP_MAIN_PAGE)->latest()->first();
        $adv_bottom = $advertisingRepo->getAdvByLocation(Advertising::LOCATION_BOTTOM_MAIN_PAGE)->latest()->first();

        return view('Home::index', compact(['homeRepo', 'adv_top', 'adv_bottom']));
    }

    public function search(Request $request)
    {
        $title = $request->title;
        $articles = resolve(HomeRepo::class)->searchArticle($title);
        return view('Home::search', compact(['title', 'articles']));
    }

}
