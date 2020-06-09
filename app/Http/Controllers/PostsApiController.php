<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Post::get(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['title' => 'required | min:5',
                'body' => 'required | min:5',
                'cover_image' => 'image|nullable|max:1999',];

        $fileNameToStore = 'noimage.jpg';
        $v = Validator::make($request->all(),$rules);

        if($v->fails()){
            return response()->json($v->errors(),400); //4xx = client error, bad request
        }else{
            //Create Post
            $post = new Post();
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = 1;
            $post->cover_image = $fileNameToStore;
            $post->save();
            return response()->json($post,201); 
             // 201 = new resource created
        }
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        //ensuring you send a json response if the post does not exist.
        //(laravel sends an automatic html response instead)
        if (is_null($post)){
            return response()->json(null,404);
        }
        return response()->json(Post::find($id),200);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Edit Post
        $post = Post::find($id);
        if (is_null($post))
        {
            return response()->json("Given Post Has Not Found",404);
        }
        else
        {

            $rules = ['title' => 'required | min:5',
                    'body' => 'required | min:5',
                    'cover_image' => 'image|nullable|max:1999',];

            $fileNameToStore ="noimage.jpg";          
            $v = Validator::make($request->all(),$rules);

            if($v->fails()){
                return response()->json($v->errors(),400); //4xx = client error, bad request
            }else{
                //Edit
                $post->title = $request->input('title');
                $post->body = $request->input('body');
                $post->user_id = 1;
                $post->cover_image = $fileNameToStore;
                $post->save();
                return response()->json($post,201); 
                 // 201 = new resource created
            }

            
        }
       

        $post->update($request->all());
        return response()->json($post,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find($id);
        //ensuring you send a json response if the post does not exist.
        //(laravel sends an automatic html response instead)
        if (is_null($post))
        {
            return response()->json("Given Post Has Not Found",404);
        }
        else
        {
            if($post->cover_image != 'noimage.jpg'){
                Storage::delete('public/cover_image/'.$post->cover_image);
            }
            $post->delete(); 
            return response()->json(null,204); 
        }
    }

    /**
     * Handles other type (customized) of errors
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ExtraError(){
        return response()->json(['error' => ["customized error's message","e.g. payment is required!"]],501);   //5XX = server error; 501 = server doesn't know what to do!
    }
}
