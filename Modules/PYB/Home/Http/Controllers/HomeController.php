<?php

namespace PYB\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use PYB\Advertising\Models\Advertising;
use PYB\Advertising\Repositories\AdvertisingRepo;
use PYB\Home\Repositories\HomeRepo;

class HomeController extends Controller
{
    public function index(HomeRepo $homeRepo, AdvertisingRepo $advertisingRepo)
    {
        $adv_top = $advertisingRepo->getAdvByLocation(Advertising::LOCATION_TOP_MAIN_PAGE)->latest()->first();
        $adv_bottom = $advertisingRepo->getAdvByLocation(Advertising::LOCATION_BOTTOM_MAIN_PAGE)->latest()->first();
        return view('Home::index', compact(['homeRepo', 'adv_top', 'adv_bottom']));
    }
}
