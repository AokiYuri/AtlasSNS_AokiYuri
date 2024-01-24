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
        $follow_user = Auth::user()->followUsers()->pluck('following_id');
        // フォローしているユーザーのidを元に投稿内容を取得
        $tweets = Post::with('user')->whereIn('user_id', $follow_user)->get();
        return view('follows.followList', compact('loginUser', 'tweets'));
    }

    //フォロワーリスト
    public function followerList(){
        //ログインユーザーを取得
        $loginUser = Auth::user();
        //フォローされているユーザーのidを取得
        $followed_user = Auth::user()->followedUsers()->pluck('followed_id');
        // フォローしているユーザーのidを元に投稿内容を取得
        $tweets = Post::with('user')->whereIn('user_id', $followed_user)->get();
        return view('follows.followerList', compact('loginUser', 'tweets'));
    }

}
