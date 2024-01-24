@extends('layouts.login')

@section('content')
<div class="search_form">
    <form action="/search" method="post">
      @csrf
      <input type="text" name="username" class="form" placeholder="ユーザー名">
      <button type="submit" class="btn btn-success"><img src="images/search.png"  width="50" height="50" ></button>
    </form>

    <!-- 検索ワードの表示 -->
    @if (!empty($searchName))
      <p class="searchWord">検索ワード: {{ $searchName }}</p>
    @endif
</div>

@foreach($userLists as $user)
<div>
    <p class="user_icon"><img src="images/icon5.png"></p>
    <p class="user_list">{{ $user->username }}</p>

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
@endforeach

@endsection
