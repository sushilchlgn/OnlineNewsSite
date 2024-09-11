<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post){
        $request->validate([
            'body'=>'required',
        ]);

        Post::create([
            'post_id'=> $post->id,
            'user_id'=> auth()->id(),
            'body'=> $request->body,
            'parent_id' => $request->parent_id ?? null,
        ]);
        return back();
    }
}
