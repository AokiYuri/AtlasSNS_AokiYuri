@extends('layouts.login')

@section('content')
<div class="otherProfile_container">
  <p class="other_user_icon">
    <img src="{{ asset('storage/'.$profileUser->images) }}" alt="User Icon" width="50" height="50">
  </p>
  <div class="otherProfile">
    <div class="other_name">
      <p class="other_profile">name</p>
      <p class="other_profileName">{{ $profileUser->username }}</p>
    </div>
    <div class="other_bio">
      <p class="other_profile">bio</p>
      <p class="other_profileName">{{ $profileUser->bio }}</p>
    </div>
  </div>
  <div class="follow_btn2">
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
</div>

<div class="post_contents">
  {{-- ユーザーの投稿内容を表示 --}}
   @foreach($tweets as $tweet)
    <div class="user_tweets">
      <p class="user_post">
        <img src="{{ asset('storage/'.$profileUser->images) }}" alt="User Icon" width="50" height="50">
      </p>
      <div class="post_block">
        <div class="post_title">
          <p class="user_post_name">{{ $tweet->user->username }}</p>
         <p class="user_post_time">{{ $tweet->created_at->format('Y-m-d H:i') }}</p>
        </div>
        <p class="user_post_content">{{ $tweet->post }}</p>
      </div>
    </div>
     @endforeach
</div>

@endsection
