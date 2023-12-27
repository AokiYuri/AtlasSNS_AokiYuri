<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;

class PostsController extends Controller
{

    public function index(){
        //Postテーブルから情報を取得する
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    //投稿の登録処理をする
    public function postCreate(Request $request)
    {
        $user_id = Auth::user()->id ;
        $posts = $request->input('userPosts');
        Post::create([
            'user_id' => $user_id,
            'post' => $posts]);
        return redirect('/top');
    }

    //投稿の編集処理をする
    public function update(Request $request)
    {
      // フォームから送られたデータの取得
      $id = $request->input('post_id');
      $posts = $request->input('post');

      Post::where('post_id', $posts)->update([
        'post' => $posts]);
      return redirect('/top');
    }

    //投稿の削除処理をする
    public function delete($posts)
    {
        Post::where('id', $posts)->delete();
        return redirect('/top');
    }
}
