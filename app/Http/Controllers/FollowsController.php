<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follow;
use App\post;

class FollowsController extends Controller
{
    //フォローリスト
    public function followList(){
        //ログインユーザーを取得
        $loginUser = Auth::user();
        //フォローしているユーザーのidを取得
        $following_user = Auth::user()->follows()->pluck('followed_id');
        // フォローしているユーザーのidを元に投稿内容を取得
        $tweets = Post::with('user')->whereIn('user_id', $following_user)->orderBy('created_at', 'desc')->get();


        return view('follows.followList', compact('loginUser', 'tweets' , 'following_user'));
    }

    //フォロワーリスト
    public function followerList(){
        //ログインユーザーを取得
        $loginUser = Auth::user();
        //
        $followers = Auth::user()->followUsers()->pluck('following_id');
        // フォロワーのidを元に投稿内容を取得
        $tweets = Post::with('user')->whereIn('user_id', $followers)->orderBy('created_at', 'desc')->get();

        return view('follows.followerList', compact('loginUser', 'tweets', 'followers'));
    }



}
