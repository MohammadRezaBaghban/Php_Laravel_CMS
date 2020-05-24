@auth
@extends('layouts.app')
@section('content')
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('posts.update',  $post->id) }}" enctype="multipart/form-data">
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
            <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"
            value="@if(isset($post->body)) {{$post->body}}
                @endif"></textarea>
        
        </div class="form-group">
            {{Form::file('cover_image')}}
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
            {{method_field('PATCH') }}
        </div>
        
        </div>       
        
 </form>
@endsection
@endauth