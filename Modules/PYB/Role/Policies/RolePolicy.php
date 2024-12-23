<?php

namespace PYB\Role\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use PYB\Role\Models\Permission;
use PYB\User\Models\User;

class RolePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_ROLES)) {
            return true;
        }
    }
}
