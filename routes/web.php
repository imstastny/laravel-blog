<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

//home

//post
Route::prefix('posts')->middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index')->withoutMiddleware('auth');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/store', [PostController::class, 'store']);
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('posts.show')->withoutMiddleware('auth');
    Route::get('/{post:slug}/edit', [PostController::class, 'edit']);
    Route::patch('/{post:slug}/edit', [PostController::class, 'update']);
    Route::delete('/{post:slug}/delete', [PostController::class, 'destroy']);
});


Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);
Route::get('/tags/{tag:slug}', [TagController::class, 'show']);





Route::get('/about', [AboutController::class, 'index']);
Route::view('/contact', 'contact');
Route::view('/login', 'login');



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
