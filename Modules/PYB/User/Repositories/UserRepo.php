<?php

namespace PYB\User\Repositories;

use PYB\User\Models\User;

class UserRepo
{
    public function index()
    {
        return User::query()->where('id', '!=', auth()->id())->latest()->paginate(10);
    }

    public function findById($id)
    {
        return User::query()->findOrFail($id);
    }

    public function delete($id)
    {
        return User::query()->where('id', '!=', auth()->id())->latest()->paginate(10);
    }

}
