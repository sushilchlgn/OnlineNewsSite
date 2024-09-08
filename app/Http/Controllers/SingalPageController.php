<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SingalPageController extends Controller
{
    public function index()
    {
        $post = Post::all();
    //     // $post = Post::where("id", $id)->paginate(1);
        return view("singalPage", compact("post"));
    }

    public function show(Request $id)
    {
        $posts = Post::find($id);
        return view("singalPage", compact("post"));
    }
}
