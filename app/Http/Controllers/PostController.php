<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $posts = Post::latest()->Paginate(9);
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function create()
    {
        return view('posts.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),

        ]);
    }
    public function store(PostRequest $request)
    {
        $attr = $request->all();
        //title to slug
        $attr['slug'] = Str::slug(request('title'));
        $attr['category_id'] = request('category'); //category nya

        //create new post
        $post = Post::create($attr);

        $post->tags()->attach(request('tags')); //tags nya
        session()->flash('success', 'Data berhasil ditambahkan');
        session()->flash('error', 'Data gagal ditambahkan');

        return redirect()->to('posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $attr = $request->all();
        $attr['category_id'] = request('category'); //perubahan permintaan categ id
        $post->update($attr);
        $post->tags()->sync(request('tags')); //sinkron tag
        session()->flash('success', 'Data berhasil diubah');
        session()->flash('error', 'Data gagal diubah');
        return redirect()->to('posts');
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        session()->flash('success', 'Data ' . $post->title . ' telah dihapus');
        return redirect()->to('posts');
    }
}
