@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<div class="box">
  {!! Form::open(['url' => '/login']) !!}

  <p class="title">AtlasSNSへようこそ</p>

  <div class="login_form">
    {{ Form::label('mail adress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
  </div>
  <div class="login_form">
    {{ Form::label('password') }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>
  {{ Form::submit('LOGIN', ['class' => 'button']) }}
  <p class="creat"><a href="/register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}
</div>
@endsection
