<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        "body",
        "user_id",
        "post_id",
        "parent_id",
    ];

    function post()
    {
        return $this->belongsTo(Post::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    function comments()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
