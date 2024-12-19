<?php

namespace PYB\User\Http\Controllers;

use PYB\User\Models\User;
use Illuminate\Http\Request;
use PYB\User\Services\UserService;
use PYB\User\Repositories\UserRepo;
use App\Http\Controllers\Controller;
use PYB\User\Http\Requests\UserRequest;
use PYB\User\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public UserRepo $repo;
    public UserService $service;

    public function __construct(UserRepo $userRepo, UserService $userService)
    {
        $this->repo = $userRepo;
        $this->service = $userService;
    }

    public function index()
    {
        $users = $this->repo->index();
        return view('User::index', compact('users'));
    }

    public function create()
    {
        return view('User::create');
    }

    public function store(UserRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = $this->repo->findById($id);
        return view('User::edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->service->update($request, $id);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('user.index');
    }
}
