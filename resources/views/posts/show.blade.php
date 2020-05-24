@extends('layouts.app')

@section('content')

<br><a href="/posts" class="btn btn-primary">Go back</a><br><br>
<img  style="width:500px;" src="/storage/cover_image/{{$post->cover_image}}">
<br><br>
    <h1>{{$post->title}}</h1>
    <div>   
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
            <form method="POST" action="{{ route('posts.destroy',  $post->id) }}" class="float-right">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" class="float-right">Delete</button>
            </form>
        @endif
    @endif
@endsection