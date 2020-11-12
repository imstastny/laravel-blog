<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function(){
    $name = request('name');
    return view('home');
});
Route::view('/about','about');
Route::view('/contact','contact');
Route::view('/login','login');

