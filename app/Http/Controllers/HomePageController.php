<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function index(){
        $post = Post::all();
        $featurePost = Post::orderBy("created_at","desc")->paginate(4);
        $ViewPost = Post::orderBy("views")->paginate(5);
    
        return view("home", compact("post","featurePost"));
    }
}
