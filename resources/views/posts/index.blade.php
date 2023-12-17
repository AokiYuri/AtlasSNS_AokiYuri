@extends('layouts.login')

@section('content')
<form action="/top" method="post">
    <div>
        <img src="images/icon5.png" alt="">
    </div>
    @csrf
    {{ Form::input('text', 'userPosts', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) }}
    <button type="submit" class="btn btn-success pull-right"><img src="/images/post.png" alt="投稿ボタン"></button>
</form>


@endsection
