<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Image;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('admin')->with('user', $user);
    }

    public function update_avatar(Request $request){

        if($request->hasfile('avatar')){

            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            // watermark 
            Image::make($avatar)->resize(300,300)->text('Fontys Recipes',120,265)->save(public_path('upload/avatars/'.$filename));
            
            $admin = Auth::admin();
            $admin->avatar = $filename;
            $admin->save();

            return view('admin')->with('admin',$admin);
        }

    }
}
