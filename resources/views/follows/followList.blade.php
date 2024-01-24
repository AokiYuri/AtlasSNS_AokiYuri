@extends('layouts.login')

@section('content')
<div class="container">
  <p class="listTitle">Follow List</p>
  <p class="user_icon"></p>
</div>

<div class="post_contents">
    @foreach($tweets as $tweet)
    <div class="follow_tweets">
        <p class="post_user">
          <img src="{{ asset('storage'.Auth::user()->images) }}" alt="User Icon">
        </p>
        <p class="post_user">{{ $tweet->user->username }}</p>
        <p class="post_content">{{ $tweet->post }}</p>
    </div>
    @endforeach
</div>

@endsection
