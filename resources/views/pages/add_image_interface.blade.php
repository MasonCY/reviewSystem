@extends('layouts/master')
@section('title')
  Products
@endsection
@section('home')
  Home
@endsection

@section('body')
  
    <form method="POST" action='{{url("image")}}' enctype="multipart/form-data">
        {{csrf_field()}}
        <!-- <p><label>Name:</label><input type="text" name="name"></p> -->

        <p><input type="file" name="image"></p>
        <input type="hidden" name="pid" value={{ $pid }} >
        <input type="hidden" name="uid" value={{ $uid }}>

        <p><input type="submit" value="Upload"> <label>{{$errors->first('image')}}</label></p>
    </form>
  @section('footer')
    
  @endsection
@endsection