<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::all();
        return view("comments.index", compact("comment"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'You must be logged in to comment.');
        }
        $request->validate([
            'body' => 'required',
        ]);

        $data = Comment::create([
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
            'body' => $request->body,
            'parent_id' => $request->parent_id ?? null,
        ]);
        // dd($data);

        return back();
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->destroy(auth()->id());
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully ');
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