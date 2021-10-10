@extends('layouts/master')
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
        <p><label>Review: </label><textarea name="review" rows="4" cols="50" >{{old('review')}}</textarea><label>{{$errors->first('review')}}</label></p>
        <input type="hidden" name="pid" value={{ $pid }} >
        <input type="hidden" name="uid" value={{ $uid }}>
        <p><input type="submit" value="Create"></p>
  @section('footer')
    
  @endsection

@endsection