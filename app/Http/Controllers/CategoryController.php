<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("admin.posts_category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("category.create");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->name = $request->name;
        $data->save();

        // dd($data->toArray());
        return redirect()->route("category.show");
    }

    /**
     * Display the specified resource.
     */
    // public function show(category $category)
    // {
    //     // $category = Category::find( $category->id);
    //     // return view("category", compact("category"));

    //     // $categories = Category::all();
    //     // return view('admin.category', compact('categories'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, category $category)
    // {
    //     $request->validate([
    //         'name'=> 'required',
    //     ]);

    //     $category->update($request->all());
    //     return redirect()->route('')->with('success','Category updated successfully');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('category.show')->with("success","Category deleted successfullly");
    }
}
