<?php

namespace PYB\Advertising\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PYB\User\Models\User;

class Advertising extends  Model
{
    use  HasFactory;
    protected  $fillable = ['user_id','imagePath','imageName','link','title'];

//   Relationship
    public  function  user ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
