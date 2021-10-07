@extends('layouts/master1')
@section('title')
  Products
@endsection
@section('home')
  Home
@endsection

@section('body')
    <h4>Follow List:</h4>
    <ol>
        @foreach($follows as $follow)
            @foreach($users as $user)
                @if($follow->followed_user_id == $user->id)
                    <li><a href='#'>{{ $user->name }} </a></li>
                @endif
            @endforeach
        @endforeach
    </ol>
   
@endsection