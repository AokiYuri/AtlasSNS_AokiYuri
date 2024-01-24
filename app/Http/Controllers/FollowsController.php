<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList(){
        //ログインユーザーを取得
        $loginUser = Auth::user();
        //フォローしているユーザーのidを取得
        $follow_user = Auth::user()->followUsers()->pluck('following_id');
        return view('follows.followList');
    }

    public function followerList(){
        return view('follows.followerList');
    }

}
