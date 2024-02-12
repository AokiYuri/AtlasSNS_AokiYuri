@extends('layouts.login')

@section('content')
<div class="search_form">
    <form action="/search" method="post">
      @csrf
      <div class="search_name">
        <input type="text" name="username" class="form" placeholder=" ユーザー名">
        <button type="submit" class="btn btn-success"><img src="images/search.png"  width="35" height="35" ></button>
      </div>
    </form>

    <!-- 検索ワードの表示 -->
    @if (!empty($searchName))
      <p class="searchWord">検索ワード: {{ $searchName }}</p>
    @endif
</div>

<div>
  @foreach($userLists as $user)
  <div class="search_top">
    <p class="search_user_icon"><img src="{{ asset('storage/' . $user->images) }}" width="50" height="50"></p>
    <p class="user_name">{{ $user->username }}</p>
    <div class="follow_btn">
      @if($loginUser->follows->contains($user->id))
        {{-- ログインユーザーがフォローしている場合 --}}
        <form  action="/search/{{$user->id}}/unfollow" method="post">
        @csrf
        <button type="submit" class="btn-unfollow">フォロー解除</button>
        </form>
      @elseif($loginUser->id !== $user->id)
        {{-- ログインユーザーがフォローしていない場合 --}}
        <form  action="/search/{{$user->id}}/follow" method="post">
        @csrf
        <button type="submit" class="btn-follow">フォローする</button>
        </form>
      @endif
    </div>
  </div>
  @endforeach
</div>

@endsection
