<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("admin.posts.posts", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable',
            'description'=> 'nullable',
            'category'=> 'required',
        ]);
        // dd($data->title, $data->description, $data->category);
        dd($data);
        $post =  Post::create($data);
        // dd($post);
        return redirect()->route('posts.index')->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        $posts = Post::all();
        // dd($post);
        return view('home', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        // dd($post);
        // $post->id = $request->id;
        $post = Post::findOrFail($post->id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category = $request->input('category');
        $post->save();
        dd($post);
        // $post->update($data);
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }
}
