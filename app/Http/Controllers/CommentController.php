<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}


// <?php

// namespace App\Http\Controllers;

// use App\Models\Comment;
// use App\Models\Post;
// use Illuminate\Http\Request;

// class CommentController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         // $posts = Post::all();
//         $comment = Comment::all();
//         return view("admin.comments.index", compact("comment"));
//     }

//     public function create(){
//         $post = Post::all();
//         $comment = Comment::all();
//         return view("admin.comments.create", compact("comment","post"));
//     }



//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request, Post $post)
//     {
//         // if (!auth()->check()) {
//         //     return redirect()->route('login')->with('message', 'You must be logged in to comment.');
//         // }
//         $request->validate([
//             'body' => 'required',
//         ]);

//         $data = Comment::create([
//             'post_id' => $request->post_id,
//             'user_id' => auth()->id(),
//             'body' => $request->body,
//             'parent_id' => $request->parent_id ?? null,
//         ]);
//         $data->save();

//         // dd($data->toarray());

//         return redirect()->route('comments.index')->with('success','Comment created successfully');
//     }

//     public function destroy()
//     {
//         // $comment = Comment::findOrFail($id);
//         Comment::delete();
//         return redirect()->route('comments.index')->with('success', 'Comment deleted successfully ');
//     }
//     public function reply(Request $request, Comment $comment)
//     {
//         // Validation
//         $request->validate([
//             'body' => 'required',
//         ]);

//         // Store the reply
//         Comment::create([
//             'post_id' => $comment->post_id,
//             'user_id' => auth()->id(),
//             'body' => $request->body,
//             'parent_id' => $comment->id,
//         ]);

//         return back();
//     }
// }