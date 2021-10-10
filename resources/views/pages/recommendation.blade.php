@extends('layouts/master')
@section('title')
  Products
@endsection
@section('home')
  Home
@endsection
@section('follow')
    <label class='home'>Recommendation</label>
@endsection
@section('follower')
    <?php $uid = Auth::user()->id?>
    <a class="navLink" href='{{url("follow/$uid")}}'>Follow</a> 
@endsection
@section('body')
    <h4>Users:</h4>
        <?php $uid = Auth::user()->id?>
        @foreach($users as $user)
            @foreach($likes as $like)
                @if($like->user_id == $user->id and $like->pivot->islike==1 and $like->user_id != $uid)
                    <?php $followedUser = FALSE; ?>
                    @foreach($follows as $follow)
                        @if($follow->followed_user_id == $user->id)
                            <?php $followedUser = TRUE; ?>
                            @break
                        @endif
                    @endforeach
                    @if($followedUser == FALSE)
                        <p>{{ $user->name }}<a href='{{url("follow/$user->id/edit")}}'> &nbsp;&nbsp;Follow </a></p>
                    @endif
                 
                @endif
            @endforeach
        @endforeach
@section('footer')
    
@endsection
   
@endsection