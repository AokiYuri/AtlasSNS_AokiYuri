@extends('layouts.login')

@section('content')
<div class='container'>
  <div class='profileUpdate'>
    <form action="/profile" method="post">
    @csrf
      <div><img src="images/icon5.png" alt="icon"></div>

      <div class="profile-block">
        <p>user name</p>
        <input type="username" name="username" value="{{ Auth::user()->username }}">
      </div>

      <div class="profile-block">
        <p>mail adress</p>
        <input type="mail" name="mail" value="{{ Auth::user()->mail }}">
      </div>

      <div class="profile-block">
        <p>password</p>
        <input type="password" name="password">
      </div>

      <div class="profile-block">
        <p>password confirm</p>
        <input type="password" name="password_confirmation">
      </div>

      <div class="profile-block">
        <p>bio</p>
        <input type="text" name="bio" value="{{ Auth::user()->bio }}">
      </div>

      <div class="profile-block">
        <p>icon image</p>
        {{ Form::text('icon_image',null,['class' => 'input']) }}
      </div>

      <input type="submit" value="更新">

    </form>
  </div>
</div>
<!-- バリデーションのエラー表示 -->
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach


@endsection
