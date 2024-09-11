<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // public function __construct()
    // {
    //     // Apply auth middleware for store and reply methods
    //     $this->middleware('auth')->only(['store', 'reply']);
    // }
    public function index()
    {
        $comments = Comment::all();
        return view("admin.comments.index", compact("comments"));
    }
    public function store(Request $request, Post $post)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'You must be logged in to comment.');
        }
        $request->validate([
            'body' => 'required',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'body' => $request->body,
            'parent_id' => $request->parent_id ?? null,
        ]);
        return back();
    }

    public function reply(Request $request, Comment $comment)
    {
        // Validation
        $request->validate([
            'body' => 'required',
        ]);

        // Store the reply
        Comment::create([
            'post_id' => $comment->post_id,
            'user_id' => auth()->id(),
            'body' => $request->body,
            'parent_id' => $comment->id,
        ]);

        return back();
    }
}
