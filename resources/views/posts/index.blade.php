@extends('layouts.login')

@section('content')
<div class="post_form">
    <form action="/top" method="post">
        @csrf
        <div class="user_icon">
            <img src="{{ asset('storage/' .Auth::user()->images) }}" alt="User Icon" width="50" height="50">
        </div>
        <div class="post_item">{{ Form::textarea('userPosts', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) }}</div>
        <button type="submit" class="btn-success"><img src="/images/post.png" width="50" height="50" alt="投稿ボタン"></button>
    </form>
    <!-- バリデーションのエラー表示 -->
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</div>
<div class="post_contents">
    @foreach($tweets as $tweet)
    <div class="post">
        <p class="post_user">
            <img src="{{ asset('storage/'.$tweet->user->images) }}" alt="User Icon" width="50" height="50">
        </p>
        <p class="post_user name">{{ $tweet->user->username }}</p>
        <p class="post_user time">{{ $tweet->created_at->format('Y-m-d H:i') }}</p>
        <p class="post_content">{!! nl2br(e($tweet->post)) !!}</p>
        <div class="post_button">
             @if($tweet->user->id === Auth::user()->id)
            <!-- 投稿の編集ボタン -->
            <p class="button"><a class="js-modal-open" href="" post="{{ $tweet->post }}" post_id="{{ $tweet->id }}"><img src="/images/edit.png" width="50" height="50" alt="編集ボタン"></a></p>

            <!-- 投稿の削除ボタン -->
            <p class="button"><a class="btn-danger" href="/top/{{$tweet->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="/images/trash-h.png" width="50" height="50" alt="削除ボタン"></a></p>
             @endif
        </div>
    </div>
    @endforeach
    <!-- モーダルの中身 -->
    <div class="modal">
        <div class="modal_bg js-modal-close"></div>
        <div class="modal_content">
            <form action="/top/update" method="post">
                <textarea name="post" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
            </form>
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
</div>

@endsection
