@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<div class="box">
  {!! Form::open(['url' => '/register']) !!}

  <h2 class="title">新規ユーザー登録</h2>

  <div class="login_form">
    {{ Form::label('user name') }}
    {{ Form::text('username',null,['class' => 'input']) }}
  </div>
  <div class="login_form">
    {{ Form::label('mail adress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
  </div>
  <div class="login_form">
    {{ Form::label('password') }}
    {{ Form::password('password',null,['class' => 'input']) }}
  </div>
  <div class="login_form">
    {{ Form::label('password confirm') }}
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}
  </div>
  {{ Form::submit('REGISTER', ['class' => 'button']) }}
    <!-- バリデーションのエラー表示 -->
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach

  <p class="creat"><a href="/login">ログイン画面へ戻る</a></p>

  {!! Form::close() !!}
</div>

@endsection
