@extends('layouts.login')

@section('content')
<div class="container">
  <p class="listTitle">Follow List</p>
  <p class="user_icon">
    @foreach($following_user as $user_id)
        @php
            $user = App\User::find($user_id);
        @endphp
        @if($user)
          <a href="{{ route('user.profile', ['user_id' => $user->id]) }}">
            <img src="{{ asset('storage/'.$user->images) }}" alt="User Icon" width="50" height="50">
          </a>
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
        <p class="post_time">{{ $tweet->created_at->format('Y-m-d H:i') }}</p>
        <p class="post_content">{{ $tweet->post }}</p>
    </div>
    @endforeach
</div>

@endsection
