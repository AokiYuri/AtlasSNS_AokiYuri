<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;
use App\Follow;
use App\User;

class PostsController extends Controller
{
    //Postモデルから情報(レコード)を取得する
    public function index(){
        // Postモデル経由でpostsテーブルのレコードを取得
        $user_id = Auth::user()->id ;
        // フォローしているユーザーのidを取得
        $followed_id = Auth::user()->follows()->pluck('followed_id')->toArray();
        // ログインユーザー自身のIDも含めて、フォローしているユーザーの投稿内容を取得
        $tweets = Post::whereIn('user_id', array_merge($followed_id, [$user_id]))->get();

        // フォローしてる人の数を取得→login.bladeはいろんな画面で使うから使えない
        //$follow = Follow::where('following_id', $user_id)->get();

        return view('posts.index', compact('tweets'));
    }

    //投稿の登録処理をする
    public function postCreate(Request $request){
        //ユーザーが認証済みであることを確認し、認証されたユーザーのIDを取得、どのユーザーが投稿を作成したかが特定される。
        $user_id = Auth::user()->id ;

        //フォームから送信されたリクエストから userPosts という名前の入力フィールドの値を取得している。この値は、新しい投稿の内容を表す。
        $posts = $request->input('userPosts');

        //Post::create() メソッドを使用して、新しい投稿をデータベースに保存している。'user_id' にはユーザーのIDが、'post' には投稿の内容がセットされ、これによりpostsテーブルに新しいレコードが追加される。
        Post::create([
            'user_id' => $user_id,
            'post' => $posts]);

        return redirect('/top');
    }

    //投稿の編集処理をする
    public function update(Request $request){
      // フォームから送られたデータの取得
      $id = $request->input('id');
      $posts = $request->input('post');

      Post::where('id', $id)->update([
        'post' => $posts]);
      return redirect('/top');
    }

    //投稿の削除処理をする
    public function delete($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

}
