<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('@{user:username}', [\App\Http\Controllers\PublicProfileController::class, 'show'])->name('profile.show');
Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('dashboard');
Route::get('/@{username}/{post:slug}',[PostController::class, 'show'])->name('post.show');


Route::middleware(['auth','verified'])->group(function () {

    Route::get('/category/{category}', [\App\Http\Controllers\PostController::class, 'category'])->name('post.byCategory');
    Route::get('/post/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/post/create', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::post('/follow/{user}',[\App\Http\Controllers\FollowerController::class, 'followUnfollow'])->name('follow');
    Route::post('/clap/{post}',[\App\Http\Controllers\ClapController::class, 'clap'])->name('clap');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
