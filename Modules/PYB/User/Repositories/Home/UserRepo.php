<?php

namespace PYB\User\Repositories\Home;

use PYB\Role\Models\Permission;
use PYB\User\Models\User;

class UserRepo
{
    public function authors()
    {
        // بارگذاری نویسندگان با استفاده از فیلتر permission
        return $this->query()->permission(Permission::PERMISSION_AUTHORS)->latest();
    }

    public function findByName($name)
    {
        // بازگرداندن اولین کاربر با نام مشخص
        return $this->query()->whereName($name)->first();
    }

    private function query()
    {
        // بازگرداندن کوئری‌بیلدر User
        return User::query();
    }
}
