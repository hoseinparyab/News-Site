<?php

namespace PYB\User\Models;

use PYB\Article\Models\Article;
use PYB\Comment\Models\Comment;
use Laravel\Sanctum\HasApiTokens;
use PYB\Category\Models\Category;
use Overtrue\LaravelLike\Traits\Liker;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Liker;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    // Methods
    public function textStatusEmailVerifiedAt(): string
    {
        if ($this->email_verified_at) return 'تایید شده';

        return 'تایید نشده';
    }

    public function cssStatusEmailVerifiedAt(): string
    {
        if ($this->email_verified_at) return 'success';

        return 'danger';
    }

    public function path()
    {
        // TODO
    }

    public function image()
    {
        return asset('assets/imgs/authors/author-14.png');
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    // TODO: Other methods

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
