@extends('layouts.login')

@section('content')
<div class="container">
  <p class="listTitle">Follow List</p>
  <p class="user_icon">
    @foreach($follow_user as $follow_user)
      <img src="{{ asset('storage/'.$follow_user->user->images) }}" alt="User Icon" width="50" height="50">
    @endforeach
  </p>
</div>

<div class="post_contents">
    @foreach($tweets as $tweet)
    <div class="follow_tweets">
        <p class="post_user">
          <img src="{{ asset('storage/'.$tweet->user->images) }}" alt="User Icon" width="50" height="50">
        </p>
        <p class="post_user">{{ $tweet->user->username }}</p>
        <p class="post_content">{{ $tweet->post }}</p>
    </div>
    @endforeach
</div>

@endsection
