@extends('layouts/master1')
@section('title')
  Products
@endsection
@section('home')
  Home
@endsection
@section('follow')

@endsection
@section('follower')

@endsection
@section('document')
@endsection
@section('body')
<h4>Add a new review:</h4>
  <form method="post" action="{{url("store_review")}}">
    {{ csrf_field() }}

       <p><label>Rating: </label><select name="rating">
            @for($i=1; $i < 6; $i++)

                @if($i == old('rating'))
                    <option value= {{$i}}  selected="selected" >{{$i}}</option>
                @else
                    <option value= {{$i}} >{{$i}}</option>
                @endif
            @endfor
 
        </select></p>
        <p><label>Review: </label><input type="text" name="review" value="{{old('review')}}"><label></label></p>
        <input type="hidden" name="pid" value={{ $pid }} >
        <input type="hidden" name="uid" value={{ $uid }}>
        <p><input type="submit" value="Create"></p>

@endsection