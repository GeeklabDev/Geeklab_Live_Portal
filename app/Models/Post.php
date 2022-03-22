<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
    function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Comment');
    }
    function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Like');
    }
    function number_of_likes()
    {
        return $this->hasMany('App\Models\Like')->where('post_id', $this->id)->count();
    }
    function number_of_comments()
    {
        return $this->hasMany('App\Models\Comment')->where('post_id', $this->id)->count();
    }
    function check_like()
    {
        return $this->hasMany('App\Models\Like')->where('post_id', $this->id)->where('user_id', Auth::id())->count();
    }

}
