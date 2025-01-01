<?php

namespace PYB\Article\Policies;

use PYB\Role\Models\Permission;
use PYB\User\Models\User;

class ArticlePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function index(User $user)
    {
        if($user->hasPermisionTo(Permission::PERMISSION_ARTICLES)){
            return true;
        }
    }
}
