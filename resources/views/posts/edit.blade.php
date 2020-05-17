@auth
@extends('layouts.app')
@section('content')
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('posts.update',  $post->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            @csrf            
            <label for="title">Title</label>
        <input type="text" class="form-control" value="@if(isset($post->title)) {{$post->title}}
        @endif" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor" value="{{$post->body}}"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {{method_field('PATCH') }}
 </form>
@endsection
@endauth