<?php

namespace PYB\Advertising\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use Illuminate\Http\Request;
use PYB\Advertising\Http\Requests\AdvertisingRequest;
use PYB\Advertising\Repositories\AdvertisingRepo;
use PYB\Advertising\Services\AdvertisingService;
use PYB\Share\Repositories\ShareRepo;
use PYB\Share\Services\ShareService;

class AdvertisingController extends Controller
{
    public AdvertisingRepo $repo;
    public AdvertisingService $service;

    public function __construct(AdvertisingRepo $advertisingRepo, AdvertisingService $advertisingService)
{
    $this->repo = $advertisingRepo;
    $this->service = $advertisingService;
}

    public function index()
{
    $advertisings = $this->repo->index()->paginate(10);
    return view('Advs::index', compact('advertisings'));
}

    public function create()
{
    return view('Advs::create');
}

    public function store(AdvertisingRequest $request)
{
    [$imageName, $imagePath] = ShareService::uploadImage($request->file('image'), null);
    $this->service->store($request, $imagePath, $imageName);

    ShareRepo::successMessage('ساخت تبیلغات');
    return to_route('advertisings.index');
}

    public function edit($id)
{
    $advertising = $this->repo->findById($id);
    return view('Advs::edit', compact('advertising'));
}

    public function update(AdvertisingRequest $request, $id)
{
    $file = $request->file('image');
    $advertising = $this->repo->findById($id);

    [$imageName, $imagePath] = $this->uploadImage($file, $advertising);

    $this->service->update($request, $id, $imagePath, $imageName);

    ShareRepo::successMessage('ویرایش تبلیغات');
    return to_route('advertisings.index');
}

    public function destroy($id)
{
    $article = $this->repo->findById($id);
    $this->service->deleteImage($article);
    $this->repo->delete($id);

    ShareRepo::successMessage('حذف تبلیغات');
    return to_route('advertisings.index');
}

    // Private Method
    private function uploadImage($file, $article): array
{
    if (!is_null($file)) {
        [$imageName, $imagePath] = ShareService::uploadImage($file, null);
    }
    else {
        $imageName = $article->imageName;
        $imagePath = $article->imagePath;
    }

    return array($imageName, $imagePath);
}
}
