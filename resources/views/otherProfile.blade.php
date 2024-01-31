@extends('layouts.login')

@section('content')
<div class="container">
  <p class="user_icon">
      <img src="{{ asset('storage/'.$profileUser->images) }}" alt="User Icon" width="50" height="50">
  </p>
  <p class="other_profileName">name</p>
    <p class="other_profileName">{{ $profileUser->username }}</p>
  <p class="other_profile">bio</p>
    <p class="other_profileName">{{ $profileUser->bio }}</p>

     @if($loginUser->follows->contains($profileUser->id))
        {{-- ログインユーザーがフォローしている場合 --}}
        <form  action="/search/{{$profileUser->id}}/unfollow" method="post">
        @csrf
        <button type="submit" class="btn-unfollow">フォロー解除</button>
        </form>
     @elseif($loginUser->id !== $profileUser->id)
        {{-- ログインユーザーがフォローしていない場合 --}}
        <form  action="/search/{{$profileUser->id}}/follow" method="post">
        @csrf
        <button type="submit" class="btn-follow">フォローする</button>
        </form>
     @endif

</div>
    <div class="post_contents">
    {{-- ユーザーの投稿内容を表示 --}}
     @foreach($tweets as $tweet)
      <div class="follow_tweets">
        <p class="post_user">
          <img src="{{ asset('storage/'.$profileUser->images) }}" alt="User Icon" width="50" height="50">
        </p>
        <p class="post_user">{{ $tweet->user->username }}</p>
        <p class="post_time">{{ $tweet->created_at->format('Y-m-d H:i') }}</p>
        <p class="post_content">{{ $tweet->post }}</p>
      </div>
     @endforeach
    </div>

@endsection
