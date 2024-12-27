<?php

namespace PYB\Comment\Models;

use PYB\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment_id', 'commentable_id', 'commentable_type', 'body', 'status'];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_NEW = 'new';
    public const STATUS_INACTIVE = 'inactive';

    public static array $statuses = [
        self::STATUS_ACTIVE,
        self::STATUS_NEW,
        self::STATUS_INACTIVE,
    ];

    // Relations
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function commentable()
    {
        return $this->morphTo();
    }
}
