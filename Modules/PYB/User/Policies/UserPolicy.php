<?php

namespace PYB\User\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use PYB\Role\Models\Permission;
use PYB\User\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_USERS)) {
            return true;
        }
    }
}
