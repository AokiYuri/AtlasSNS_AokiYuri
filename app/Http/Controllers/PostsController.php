<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;

class PostsController extends Controller
{
    //Postテーブルから情報を取得する
    public function index(){
        $tweets = Post::all();
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
