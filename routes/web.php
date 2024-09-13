<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomePageController::class, 'index']);

Route::resource('categories', CategoryController::class);

Route::get('/post/{id}', function ($id) {
    $posts = Post::find($id);
    return view('singalPage', compact('posts'));
})->name('posts.page');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create',function () {
        return view('admin.posts_category.add-category');
    })->name('category.add');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    // Route::get('/category', [CategoryController::class, 'show'])->name('category.show');

    Route::resource('comments', CommentController::class);
    // Route::get('/posts/comments', [CommentController::class, 'index'])->name('comments.show');
    // Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    // route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
    Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply')->middleware('auth');
});

Route::get('/category{id}', function ($id) {
    $category = category::find($id);
    $posts = Post::where('category_id', $id)->get();
    return view('category', compact('category', 'posts'));
})->name('category.show');



require __DIR__ . '/auth.php';
