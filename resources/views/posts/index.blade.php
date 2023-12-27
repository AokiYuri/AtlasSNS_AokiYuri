@extends('layouts.login')

@section('content')
<div>
    <form action="/top" method="post">
        @csrf
        <div><img src="images/icon5.png" alt="">
        {{ Form::input('text', 'userPosts', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) }}
        </div>
        <button type="submit" class="btn-success pull-right"><img src="/images/post.png" width="50" height="50" alt="投稿ボタン"></button>
    </form>
</div>
<div>
    @foreach($posts as $post)
    <div>
        <p class="post"><img src="images/icon5.png"></p>
        <p class="post">{{ Auth::user()->username }}</p><br>
        <p class="post">{{ $post->post }}</p>
        <div class="content">
        <!-- 投稿の編集ボタン -->
        <p class="button"><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="/images/edit.png" width="50" height="50" alt="編集ボタン"></a>
    </div>
        <!-- モーダルの中身 -->
        <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <form action="" method="">
                    <textarea name="" class="modal_post"></textarea>
                    <input type="hidden" name="" class="modal_id" value="">
                    <input type="submit" value="更新">
                    {{ csrf_field() }}
                </form>
                <a class="js-modal-close" href="">閉じる</a>
            </div>
        </div>
        <p class="button"><a class="btn-danger" href="/top/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="/images/trash-h.png" width="50" height="50" alt="削除ボタン"></a></p>
    </div>
    @endforeach
</div>

@endsection
