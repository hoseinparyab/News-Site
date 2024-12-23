<?php

namespace Mlk\Panel\Policies;

use PYB\User\Models\User;
use PYB\Role\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PanelPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_PANEL)) {
            return true;
        }
    }
}
