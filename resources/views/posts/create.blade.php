@extends('layouts.app',['title' => 'New Post'])

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">New Post</div>
            <div class="card-body">
                <form action="/posts/store" method="post">
                    @csrf
                    @include('posts.partials.form-controls', ['submit' => 'Create'])
                </form>
            </div>
        </div>
    </div>
</div>
@stop