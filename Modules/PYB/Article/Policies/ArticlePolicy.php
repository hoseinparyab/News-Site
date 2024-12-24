<?php

namespace PYB\Article\Policies;

use PYB\User\Models\User;
use PYB\Role\Models\Permission;

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
