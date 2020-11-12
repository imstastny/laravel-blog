<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get('/', function(){
    $name = request('name');
    return view('home');
});

Route::get('/posts/{slug}',[PostController::class,'show']);
Route::view('/about','about');
Route::view('/contact','contact');
Route::view('/login','login');

