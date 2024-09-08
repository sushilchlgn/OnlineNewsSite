<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SingalPageController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/page', function () {
    return view('singalPage');
});


Route::get('/category/create', [CategoryController::class, 'index'])->name('category.show');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category', [CategoryController::class, 'destroy'])->name('category.delete');

Route::resource('categories', CategoryController::class);

Route::resource('posts', PostController::class);

Route::get('/', [HomePageController::class, 'index']);

// Route::get('/post/{id}',[SingalPageController::class,'show'])->name('posts.page');
Route::get('/post/{id}', function($id){
    $posts = Post::find($id);
    return view('singalPage' , compact('posts'));
})->name('posts.page');

Route::put('/posts/updates/{id}', function (Request $request, Post $post) {

    $request->validate([
        'title' => 'nullable',
        'description' => 'nullable',
        'category' => 'required',
    ]);

    $post = Post::findOrFail($post->id);
    $post->title = $request->input('title');
    $post->description = $request->input('description');
    $post->category = $request->input('category');
    $post->save();
    return  redirect()->route('/');
})->name('posts.updates');

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
