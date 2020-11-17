<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


Route::get('/', HomeController::class);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/login', 'login');
