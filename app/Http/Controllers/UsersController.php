<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;
use App\Post;
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

        // バリデーションを設定する //
        $request->validate([
            'username' => 'required|min:2|max:12|',
            'mail' =>
              ['required',
               'min:5',
               'max:40',
               Rule::unique('users', 'mail')->ignore(auth()->id()),
               'email:filter,dns',
               ],
            'password' => 'required|alpha_num|min:8|max:20|confirmed|',
            'bio' => 'max:150',
            'images' => 'nullable|image|mimes:jpg,png,bmp,gif,svg|max:2048',
        ]);

        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');

         if ($request->hasFile('images')) {
        $filename = $request->file('images')->getClientOriginalName();
        $img = $request->file('images')->storeAs('', $filename, 'public');
         } else {
        // 画像がアップロードされない場合は元のアイコン画像のままにする
        $img = auth()->user()->images;
         }

        User::where('id', $id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio,
            'images' => isset($img) ? $img : null,
            // 画像がアップロードされていない場合はnullをセット
        ]);

        return redirect('/top');
    }

    //ユーザーリスト表示
    public function userList(Request $request){
        //ログインユーザーを取得
        $loginUser = Auth::user();
        //ログインユーザーを除外してユーザーリストを取得
        $userLists = User::whereNotIn('id', [$loginUser->id])->get();
        return view ('users.search', compact('userLists', 'loginUser'));
    }

    //ユーザー検索
    public function search(Request $request){
        // 1つ目の処理
        $searchName = $request->input('username');
        $loginUser = Auth::user();
        // 2つ目の処理
        if(!empty($searchName)){
             $userLists = User::where('username','like', '%'.$searchName.'%')->get();
        }
        else{
             $userLists = User::all();
        }
        // 3つ目の処理
        return view('users.search', compact('userLists','searchName' , 'loginUser'));
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


    public function others($user_id) {
        // 選択したユーザーのプロフィール情報を取得
        $profileUser = User::with('posts')->find($user_id);

        // ログインユーザーを取得
        $loginUser = Auth::user();

        // ログインユーザーがフォローしているかどうかの判定
        $following_user = Auth::user()->follows()->pluck('followed_id');

        // ユーザーの投稿内容を取得
        $tweets = Post::with('user')->where('user_id', $user_id)->get();

        // ビューにデータを渡す
        return view('otherProfile', compact('profileUser', 'loginUser', 'tweets'));
    }

}
