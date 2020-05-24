@auth
@extends('layouts.app')

@section('content')
<br>
    <h1>Create Post</h1>
    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        <div class="form-group">
            @csrf            
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title"/>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor" placeholder="Body Text"></textarea>
        
        </div class="form-group">
            {{Form::file('cover_image')}}
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
@endauth