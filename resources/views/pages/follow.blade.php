@extends('layouts/master')
@section('title')
  Products
@endsection
@section('home')
  Home

@endsection

@section('follower')
    <label class='home'>Follow</label>
@endsection
@section('body')
    <h4>Follow List:</h4>
 
        @foreach($follows as $follow)
            @foreach($users as $user)
                @if($follow->followed_user_id == $user->id)
                   <p><a href='{{url("show_reviews/$user->id")}}'>{{ $user->name }} </a></p>
                @endif
            @endforeach
        @endforeach

@endsection