<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Auth;

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
        //$images = $request->file('images');
        $filename = $request->file('images')->getClientOriginalName();
        $img = $request->file('images')->storeAs('public', $filename);

        User::where('id', $id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio,
            'images' => $filename,
        ]);

        return redirect('/top');
    }

    //ユーザーリスト表示
    public function userList(Request $request){
        //ログインユーザーを取得
        $loginUser = Auth::user();
        //ログインユーザーを除外してユーザーリストを取得
        $userLists = User::whereNotIn('id', [$loginUser->id])->get();
        return view ('users.search', compact('userLists','loginUser'));
    }

    //ユーザー検索
    public function search(Request $request){
        // 1つ目の処理
        $searchName = $request->input('username');
        // 2つ目の処理
        if(!empty($searchName)){
             $userLists = User::where('username','like', '%'.$searchName.'%')->get();
        }
        else{
             $userLists = User::all();
        }
        // 3つ目の処理
        return view('users.search', compact('userLists','searchName'));
    }

    //フォロー機能
    public function follow(User $user) {
        $follow = Follow::create([
            'following_id' => \Auth::user()->id,
            'followed_id' => $user->id,]);
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
