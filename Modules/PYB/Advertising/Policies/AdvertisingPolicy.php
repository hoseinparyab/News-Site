<?php

namespace App\Policies;

use PYB\Role\Models\Permission;

class AdvertisingPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function mange($user)
    {
       if ($user ->hasPermission(Permission::PERMISSION_ADVERTISINGS))
       {
           return true;
       }
    }
}
