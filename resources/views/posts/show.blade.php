@extends('layouts.app')

@section('content')
<br>
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
            <button type="submit" class="btn btn-danger" class="float-right">Delete</button>
            <form method="POST" action="{{ route('posts.destroy',  $post->id) }}" class="float-right">
                @method('DELETE')
                @csrf

                
            <button type="button" class="btn btn-default"><a href="/posts" >Go back</a></button>
            </form>
        @endif
    @endif
@endsection