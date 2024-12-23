<?php

namespace PYB\Role\Database\Seeders;

use Illuminate\Database\Seeder;
use PYB\Role\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        foreach (Permission::$permissions as $permission) {
            \Spatie\Permission\Models\Permission::findOrCreate($permission);
        }
    }
}
