@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{$post->title}}</h1>
    <div>   
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    <form method="POST" action="{{ route('posts.destroy',  $post->id) }}" class="float-right">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger" class="float-right">Delete</button>
    </form>
@endsection