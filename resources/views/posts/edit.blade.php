@extends('layouts.app',['title' => 'Edit Post'])

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Edit Post > {{$post->title}}</div>
            <div class="card-body">
                <form action="/posts/{{$post->slug}}/edit" method="post">
                    @method('patch')
                    @csrf
                    @include('posts.partials.form-controls')
                </form>
            </div>
        </div>
    </div>
</div>
@stop