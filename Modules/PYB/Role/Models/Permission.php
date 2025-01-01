<?php

namespace PYB\Role\Models;

use Spatie\Permission\Models\Permission as PemissionSpatie;

class Permission extends PemissionSpatie
{
    PUBLIC CONST PERMISSION_SUPER_ADMIN = 'permission super admin';
    PUBLIC CONST PERMISSION_PANEL = 'permission panel';
    PUBLIC CONST PERMISSION_USERS = 'permission users';
    PUBLIC CONST PERMISSION_CATEGORIES = 'permission categories';
    PUBLIC CONST PERMISSION_ROLES = 'permission roles';
    public const PERMISSION_ARTICLES = 'permission articles';
    public const PERMISSION_AUTHORS = 'permission authors';
    public const PERMISSION_COMMENTS = 'permission comments';
    public const PERMISSION_ADVERTISINGS = 'permission advertisings';

    public static array $permissions = [
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_PANEL,
        self::PERMISSION_USERS,
        self::PERMISSION_CATEGORIES,
        self::PERMISSION_ROLES,
        self::PERMISSION_ARTICLES,
        self::PERMISSION_AUTHORS,
        self::PERMISSION_COMMENTS,
        self::PERMISSION_ADVERTISINGS,
    ];
}
