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
<h4>Add a new phone:</h4>
  <form method="post" action="{{url("product")}}">
    {{ csrf_field() }}
    @if($errors->any())
      <table>
        <tr><td width="10%">Name: </td><td width="40%"><input type="text" name="name" value="{{ old('name')}}" size = '45'></td><td><label>{{$errors->first('name')}}</label></td></tr>
        <tr><td>Price: </td><td><input type="text" name="price" value="{{ old('price')}}"  size = '45'></td><td><label>{{$errors->first('price')}}</label></td></tr>
        <tr><td>Manufactuer: </td><td><input type="text" name="manufacturer" value="{{ old('manufacturer')}}"  size = '45'></td><td><label>{{$errors->first('manufacturer')}}</label></td></tr>
        <tr><td>Description: </td><td><input type="text" name="description"   value="{{ old('description')}}"  size = '45'></td><td><label>{{$errors->first('description')}}</label></td></tr>
        <tr><td>Url: </td><td><input type="text" name="url" value="{{ old('url')}}"  size = '45'></td><td><label>{{$errors->first('url')}}</label></td></tr>
        <tr><td colspan="3">Please check the information above and click on add: </td></tr>
        <tr><td colspan=3><input type="submit" value="Add" class="button_add_book">
      </table>
    @else
      <table>
          <tr><td width="10%">Name: </td><td width="40%"><input type="text" name="name" value="{{ old('name')}}" size = '45'></td></tr>
          <tr><td>Price: </td><td><input type="text" name="price" value="{{ old('price')}}"  size = '45'></td></tr>
          <tr><td>Manufactuer: </td><td><input type="text" name="manufacturer" value="{{ old('manufacturer')}}"  size = '45'></td></tr>
          <tr><td>Description: </td><td><input type="text" name="description"   value="{{ old('description')}}"  size = '45'></td></tr>
          <tr><td>Url: </td><td><input type="text" name="url" value="{{ old('url')}}"  size = '45'></td></tr>
          <tr><td colspan="2">Please check the information above and click on add: </td></tr>
          <tr><td colspan="2"><input type="submit" value="Add" class="button_add_book">
        </table>
    @endif


@endsection