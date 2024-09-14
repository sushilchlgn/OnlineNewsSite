<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'post_id',
        'parent_id',
    ];

    // Each comment belongs to a post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Each comment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A comment can have many replies (child comments)
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Parent comment, useful when accessing the parent of a reply
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
