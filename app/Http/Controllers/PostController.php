<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstorFail();
        return view('posts.show', compact('post'));
    }
}
