@extends('layouts.login')

@section('content')
<div class='profile_container'>
  <form action="/profile" method="post"  enctype="multipart/form-data">
    @csrf
    <div class='profile_update'>
      <div class="profile_icon"><img src="{{ asset('storage/' .Auth::user()->images) }}" alt="User Icon" width="50" height="50"></div>
      <div class="profile_block">
        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
      </div>
      <div class="profile_blocks">
        <div class="profile_block">
          <p>user name</p>
          <input class="user_profiles" type="username" name="username" value="{{ Auth::user()->username }}">
        </div>

        <div class="profile_block">
          <p>mail adress</p>
          <input class="user_profiles" type="mail" name="mail" value="{{ Auth::user()->mail }}">
        </div>

        <div class="profile_block">
          <p>password</p>
          <input class="user_profiles" type="password" name="password">
        </div>

        <div class="profile_block">
          <p>password confirm</p>
          <input class="user_profiles" type="password" name="password_confirmation">
        </div>

        <div class="profile_block">
          <p>bio</p>
          <input class="user_profiles" type="text" name="bio" value="{{ Auth::user()->bio }}">
        </div>

        <div class="profile_block">
          <p>icon image</p>
          <div class="icon_change">
            <label for="user_profiles_icon">ファイルを選択</label>
            <input id="user_profiles_icon" type="file" name="images">
          </div>
        </div>
        <input class="button2" type="submit" value="更新">
      </div>
    </div>
  </form>
</div>
<!-- バリデーションのエラー表示 -->
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach

@endsection
