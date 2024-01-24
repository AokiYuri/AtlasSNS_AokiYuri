@extends('layouts.login')

@section('content')
<div class='container'>
  <div class='profileUpdate'>
    <form action="/profile" method="post"  enctype="multipart/form-data">
    @csrf
      <div><img src="{{ asset(Auth::user()->images) }}" alt="User Icon"></div>

      <div class="profile-block">
        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
      </div>

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
        <input type="file" name="images">
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
