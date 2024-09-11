<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',

    ];
    public function category()
{
    return $this->belongsTo(category::class);
}
public function user(){
    return $this->belongsTo(User::class);
}
public function comments(){
    return $this->hasMany(Comment::class);
}
}
