<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //プロフィール編集機能
    public function updateProfile(Request $request){
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');

        User::where('id', $id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => Hash::make($request->password),
            'bio' => $bio,
        ]);

        return redirect('/top');
    }

    //ユーザーリスト表示
    public function userList(Request $request){
        $userLists = User::all();
        return view ('users.search', compact('userLists'));
    }

    //ユーザー検索
    public function search(Request $request){
        // 1つ目の処理
        $username = $request->input('username');
        // 2つ目の処理
        if(!empty($username)){
             $users = UsersController::where('username','like', '%'.$username.'%')->get();
        }
        // 3つ目の処理
        return redirect('/search');
    }

    //フォロー機能
    public function follow(User $user) {
        $follow = Follow::create([
            'following_id' => \Auth::user()->id,
            'followed_id' => $user->id,
        ]);
        $followCount = count(Follow::where('followed_id', $user->id)->get());
        return back();
    }

    //フォロー解除
    public function unfollow(User $user) {
        $follow = Follow::where('following_id', \Auth::user()->id)->where('followed_id', $user->id)->first();
        $follow->delete();
        $followCount = count(Follow::where('followed_id', $user->id)->get());

        return back();
    }

}
