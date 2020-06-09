<?php

namespace App\Http\Controllers;

use PDF;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $posts = Post::orderBy('title','desc')->get();
       // $post = Post::where('title', 'Post Two')->take(1)->get();
       // $posts = DB::select('SELECT * FROM `posts`'); 
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'summary-ckeditor' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle FileUpload
        if ($request->hasfile('cover_image')){

            //Get file name with Extension
            $fileNameWithExt = $request -> file('cover_image')->getClientOriginalName();

            //Get Just FileName
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get Just FileExtension
            $fileExtension = $request->file('cover_image')->getClientOriginalExtension();

            //File Name To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;

            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('summary-ckeditor');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts ')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);

        // check for correct user 
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'summary-ckeditor' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle FileUpload
        if ($request->hasfile('cover_image')){

            //Get file name with Extension
            $fileNameWithExt = $request -> file('cover_image')->getClientOriginalName();

            //Get Just FileName
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get Just FileExtension
            $fileExtension = $request->file('cover_image')->getClientOriginalExtension();

            //File Name To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;

            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);
        }        

        //Edit Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('summary-ckeditor');
        if ($request->hasfile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts ')->with('success', 'Post updated');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // check for correct user 
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_image/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('posts')->with('success','Post removed');
    }

    public function get_postPdf($id){
        $post = Post::find($id);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->show($id));
        return $pdf->stream();
    }
}
