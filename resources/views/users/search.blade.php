@extends('layouts.login')

@section('content')
<form action="/search" method="post">
        @csrf
      <input type="text" name="username" class="form" placeholder="ユーザー名">
      <button type="submit" class="btn btn-success"><img src="images/search.png"></button>
    </form>

@endsection
