@extends('layouts/master')
@section('title')
  Products
@endsection
@section('home')
  Home
@endsection
@section('follower')
@auth
  <?php $uid = Auth::user()->id?>
  <a class="navLink" href='{{url("follow/$uid")}}'>Follow</a> 
@endauth
@endsection

@section('body')
  <p class="reviews" style="background-color: blanchedalmond; color: black;" align='center' > Reivews</p>

    @foreach($reviews as $review) 
        <?php $ppid = $review->pivot->id; ?>
        <?php $followed_user_id = $review->pivot->user_id ?>
        <?php $rating = $review->pivot->rating;?>
        <?php $filename ="images/".strval($rating).'.png'?>
        <?php $numberOfLikes = $review->pivot->likes ?>
        <?php $numberOfDislikes = $review->pivot->dislikes?>

        <p><span class ='left'><a class="navLink" name='{{$ppid}}'>{{$review -> name}}</a> </span> &nbsp;&nbsp;&nbsp;  <img src='{{url("$filename")}}'  style="width:140px;height:20px; margin:0px 20px;">  <span class ='right' >{{$review->pivot->create_date}}</span></p>
      @if($numberOfLikes> $numberOfDislikes)
        <p style="background-color: blanchedalmond;" >{{$review -> pivot->review}}</p>
      @else
        <p style="background-color: cornsilk;" >{{$review -> pivot->review}}</p>
      @endif
    @endforeach

   
@endsection