@extends('layouts.login')

@section('content')

<div><img src="images/icon5.png" alt="icon"></div>

<div class="profile-block">
{{ Form::label('user name') }}
<input type="user_name" name="user_name" value="{{ Auth::user()->username }}">
</div>

<div class="profile-block">
{{ Form::label('mail adress') }}
<input type="mail_adress" name="mail_adress" value="{{ Auth::user()->mail }}">
</div>

<div class="profile-block">
{{ Form::label('password') }}
<input type="password" name="password">
</div>

<div class="profile-block">
{{ Form::label('password confirm') }}
<input type="password" name="password_confirmation">
</div>

<div class="profile-block">
{{ Form::label('bio') }}
<input type="text" name="bio" value="{{ Auth::user()->bio }}">
</div>

<div class="profile-block">
{{ Form::label('icon image') }}
{{ Form::text('icon_image',null,['class' => 'input']) }}
</div>

{{ Form::submit('更新') }}

<!-- バリデーションのエラー表示 -->
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach


@endsection
