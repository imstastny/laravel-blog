@extends('layouts.app')

@section('title',$post->title)

@section('content')
<h1>{{$post->title}}</h1>
<div class="text-secondary">
    <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> &middot; {{$post->created_at->format('d F, Y')}}
</div>
<hr>
<p>{{$post->body}}</p>
<div class="text-secondary">
    @foreach ($post->tags as $tag)
    <a href="/tags/{{$tag->slug}}">{{$tag->name}}</a> ,
    @endforeach
</div>
<hr>
<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-link text-danger p-0" data-toggle="modal" data-target="#exampleModal">
        HAPUS
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <div> Judul : {{$post->title}}</div>
                        <div class="text-secondary">
                            <small> Published at : {{$post->created_at->format('d F, Y')}}</small>
                        </div>
                    </div>
                    <form action="/posts/{{$post->slug}}/delete" method="post">
                        @csrf
                        @method('delete')
                        <div class="d-flex">
                            <button class="btn btn-danger mr-3" type="submit">Delete</button>
                            <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection