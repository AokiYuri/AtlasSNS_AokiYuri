@extends('layouts.login')

@section('content')
<div class="container">
  <p class="listTitle">Follow List</p>
</div>

@foreach($followList as $list)
<div>
    <p class="user_icon"><img src="images/icon5.png"></p>
    <p class="user_list">{{ $list->username }}</p>
</div>

@endforeach

@endsection
