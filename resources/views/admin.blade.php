@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif     
                    
                    <div class="container">
                        <table class="table table-stripped">
                            <tr align="center   ">
                                <th colspan="2" ><h2>{{$user->name}} `s Profile Details<h2></th>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/upload/avatars/{{$user->avatar}}" 
                                    style="width:150px; height:150px; float: left; border-radius:50% ">                                                                       
                                </td>       
                                <td>
                                    <form enctype="multipart/form-data" action="/profile" method="POST">
                                        @csrf
                                        <h5>Update Profile Image</h5><br>
                                        <input type="file" name="avatar">
                                        <input type="hidden" name="_value" value="{{ csrf_token() }}"><br><br>
                                        <input type="submit" class="pull-right btn btn-success">
                                    </form>    
                                </td>                   
                            </tr>
                        </table>
                    </div>
                    <br><hr><br>
                    <div class="container">
                        <h3>Your Blog Posts</h3>
                        @if(count($user->posts) > 0)
                        <table class="table table-stripped">
                                <tr>
                                    <td>Title</td>
                                    <td colspan="2">Operations</td>
                                </tr>
                            @foreach ($user->posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a>
                                        <form method="POST" action="{{ route('posts.destroy',  $post->id) }}" class="float-right">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" class="float-right">Delete</button>
                                        </form>
                                    </td>
                                </tr> 
                            @endforeach
                            
                               
                                
                            
                        </table>
                        <a href="/posts/create" class="btn btn-primary">Create Post<a>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
