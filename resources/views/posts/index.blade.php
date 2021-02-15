@extends('layouts.app')

@section('title','Halaman Post')

@section('content')
<div class="d-flex justify-content-between">
    <div>
        @isset($category)
        <h4>Category : {{$category->name}}</h4>
        @endisset

        @isset($tag)
        <h4>Tag : {{$tag->name}}</h4>
        @endisset

        @if(!isset($category) && !isset($tag))
        <h4>All Posts</h4>
        @endif
    </div>
    <div>
        @auth
        <a href="/posts/create" class="btn btn-primary">Add Post</a>
        @else
        <a href="/posts/create" class="btn btn-primary">Login to create new post</a>
        @endauth

    </div>
</div>
<hr>
@include('layouts.flash')


<div class="row">
    @if($posts->count())
    @foreach($posts as $post)
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header">{{$post->title}}</div>
            <div class="card-body">
                <div>
                    {{Str::limit($post->body,100)}}
                </div>
                <a href="/posts/{{$post->slug}}">Read more</a>
            </div>
            <div class="card-footer d-flex justify-content-between">
                Published on {{$post->created_at->format("d F, Y")}}
                @auth
                <a href="/posts/{{$post->slug}}/edit" class="btn btn-sm btn-success">
                    Edit
                </a>
                @endauth
            </div>
        </div>
    </div>
    @endforeach

    @else
    <div class="alert alert-info">
        No Post
    </div>
    @endif
</div>
<div class="d-flex justify-content-center">
    <div>
        {{ $posts->links() }}
    </div>
</div>

@stop