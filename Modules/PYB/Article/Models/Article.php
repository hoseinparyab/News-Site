<?php

namespace PYB\Article\Models;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model implements Viewable
{
    use HasFactory, InteractsWithViews, Likeable;

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'content', 'image', 'status'];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_PENDING = 'pending';
    public static  $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_PENDING];

    public const TYPE_VIP = 'vip';
    public const TYPE_NORMAL = 'normal';

    public static  $types = [self::TYPE_VIP, self::TYPE_NORMAL];
}
