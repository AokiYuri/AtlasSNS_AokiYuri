@extends('layouts.login')

@section('content')
<div class="container">
  <p class="listTitle">Follower List</p>
  <p class="user_icon">
     @foreach($followers as $user_id)
        @php
            $user = App\User::find($user_id);
        @endphp
        @if($user)
            <img src="{{ asset('storage/'.$user->images) }}" alt="User Icon" width="50" height="50">
        @endif
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
