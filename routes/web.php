<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SingalPageController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/', [HomePageController::class, 'index']);

// Route::get('/page', function () {
//     return view('singalPage');
// });

Route::resource('categories', CategoryController::class);

Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');



// Route::get('/post/{id}',[SingalPageController::class,'show'])->name('posts.page');
Route::get('/post/{id}', function ($id) {
    $posts = Post::find($id);
    return view('singalPage', compact('posts'));
})->name('posts.page');


Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/category/create', [CategoryController::class, 'index'])->name('category.show');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/category', [CategoryController::class, 'destroy'])->name('category.delete');
});



require __DIR__ . '/auth.php';
