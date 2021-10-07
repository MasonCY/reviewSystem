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
<h4>Update review:</h4>
  <form method="post" action='{{url("review/$review->id")}}'>
    {{ csrf_field() }}
    {{method_field('PUT')}}

    @if($errors->any())
       <p><label>Rating: </label><select name="rating">
            @for($i=1; $i < 6; $i++)

                @if($i == old('rating'))
                    <option value= {{$i}}  selected="selected" >{{$i}}</option>
                @else
                    <option value= {{$i}} >{{$i}}</option>
                @endif
            @endfor
 
        </select></p>
        <p><label>Review: </label><textarea  name="review" value="{{old('review')}}" rows="4" cols="50"></textarea><label></label></p>
    @else
        <p><label>Rating: </label><select name="rating">
            @for($i=1; $i < 6; $i++)

                @if($i == $review->rating)
                    <option value= {{$i}}  selected="selected" >{{$i}}</option>
                @else
                    <option value= {{$i}} >{{$i}}</option>
                @endif
            @endfor
 
           </select></p>
        <p><label>Review: </label><textarea name="review" rows="4" cols="50" >{{$review->review}}</textarea><label></label></p>
    @endif
    <input type="hidden" name="destination" value={{$path}}>
        <p><input type="submit" value="Update"></p>

@endsection