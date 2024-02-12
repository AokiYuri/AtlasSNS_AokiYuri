@extends('layouts.logout')

@section('content')
<div class="box2">
  <div class="clear">
    <p>{{ session('username') }}さん</p>
    <p>ようこそ！AtlasSNSへ</p>
  </div>
  <div class="comment">
    <p>ユーザー登録が完了いたしました。</p>
    <p>早速ログインをしてみましょう！</p>
  </div>
  <p class="button2"><a href="/login">ログイン画面へ</a></p>

</div>
@endsection
