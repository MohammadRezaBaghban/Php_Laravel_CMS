@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form method="patch" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            @csrf            
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title"/>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor" placeholder="Body Text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
 </form>
@endsection