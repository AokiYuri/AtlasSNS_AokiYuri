@extends('layouts.login')

@section('content')
<div class="user_container">
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
    <div class="user_tweets">
      <div class="post_titles">
        <p class="user_post">
          <img src="{{ asset('storage/'.$tweet->user->images) }}" alt="User Icon" width="50" height="50">
        </p>
        <p class="user_post_name">{{ $tweet->user->username }}</p>
        <p class="user_post_time">{{ $tweet->created_at->format('Y-m-d H:i') }}</p>
      </div>
      <p class="user_post_content">{{ $tweet->post }}</p>

    </div>
    @endforeach
</div>

@endsection
