<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    public function postCreate(Request $request)
    {
        $user_id = Auth::user()->id ;
        $posts = $request->input('userPosts');
        Post::create([
            'user_id' => $user_id,
            'post' => $posts]);
        return redirect('/top');
    }
}
