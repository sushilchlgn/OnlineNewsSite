<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/page', function () {
    return view('singalPage');
});


Route::get('/category/create', [CategoryController::class,'index'])->name('category.show');
Route::post('/category/create', [CategoryController::class, 'store'] )->name('category.store');
Route::delete('/category', [CategoryController::class,'destroy'])->name('category.delete');

Route::resource('categories', CategoryController::class);

Route::resource('posts', PostController::class);

Route::get('/',[HomePageController::class,'index']);

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


