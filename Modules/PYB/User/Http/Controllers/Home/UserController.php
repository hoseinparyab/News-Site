<?php

namespace PYB\User\Http\Controllers\Home;

use PYB\Role\Models\Permission;
use PYB\User\Services\UserService;
use App\Http\Controllers\Controller;
use PYB\Share\Services\ShareService;
use PYB\Share\Repositories\ShareRepo;
use PYB\User\Repositories\Home\UserRepo;
use PYB\Article\Repositories\ArticleRepo;
use PYB\User\Http\Requests\UpdateProfileRequest;

class UserController extends Controller
{
    public UserRepo $repo;

    public function __construct(UserRepo $userRepo)
    {
        $this->repo = $userRepo;
    }

    public function authors()
    {
        $authors = $this->repo->authors()->with('profile', 'roles')->paginate(50); // بارگذاری روابط مورد نیاز
        return view('User::Home.authors', compact('authors'));
    }

    public function author($name, ArticleRepo $articleRepo)
    {
        $author = $this->repo->findByName($name)->Permission(Permission::PERMISSION_AUTHORS)->first(); // تغییر نام متغیر به `author` برای خوانایی بیشتر
        if (is_null($author)) abort(404);
        $articles = $articleRepo->getArticlesByUserId($author->id)->paginate(10);
        return view('User::Home.author', compact('author', 'articles')); // ارسال متغیر به ویو
    }
    public function profile()
    {
        return view('User::Home.profile');
    }
   public function updateProfile(UpdateProfileRequest $request, UserService $userService)
    {
        if ($request->image) {
            [$imageName, $imagePath] = ShareService::uploadImage($request->file('image'), 'users');
        } else {
            $imageName = auth()->user()->imageName;
            $imagePath = auth()->user()->imagePath;
        }

        $userService->updateProfile($request, auth()->id(), $imageName, $imagePath);

        ShareRepo::successMessage('بروزرسانی پروفایل کاربری');
        return back();
    }
}
