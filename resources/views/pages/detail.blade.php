@extends('layouts/master1')
@section('title')
  Products
@endsection
@section('home')
  Home
@endsection
@section('follow')
@auth
  @if(Auth::user()->user_type == 'Moderator')
        <p> <a class="navLink" href='{{url("product/$product->id/edit")}}'>Update</a></p>
  @endif
@endauth
@endsection
@section('follower')
@auth
  <?php $uid = Auth::user()->id ?> 
  @if(Auth::user()->user_type == 'Moderator')
        <form method="post" action='{{url("product/$product->id")}}'>
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input type="submit" value="Delete" class='submit'>
        </form>
  @endif
@endauth
@endsection
@section('document')
@endsection
@section('body')
<h4>Phone detail:</h4>
 
<table>
    <tr><th>Name</th><th>Price</th><th>Make</th><th>Description</th></tr>
    <tr><td>{{$product->name}}</td> <td> {{$product->price}}</td><td> {{$product->manufacturer}}</td><td> {{$product->description}}</td>
    @auth
      <td><a href='{{url("add_image/$product->id/$uid")}}'>Upload</a></td>
    @endauth
    </tr> 
  </table>
    <div class="clearfix">
      @foreach($images as $image)
      <div class="img-container">
        <figure> 
          <img src="{{url($image->name)}}" alt="product image" style="width:300px;height:300px;">
          @foreach($users as $user)
            @if($image->user_id == $user->id)
             <figcaption class='image_link'> Uploaded by: {{ $user->name }}</figcaption> 
            @endif
          @endforeach
        </figure>
      </div>
      @endforeach
    </div>
       
  <p class="reviews" style="background-color: blue; color: white;" align='center' > Reivews</p>
  <!-- <table>
  <tr><th>Reviewer</th><th>Review</th><th>ReviewTime</th><th>Operation</th></tr> -->
    @foreach($reviews as $review) 
        <!-- <tr><td>{{$review -> name}}</td><td>{{$review -> pivot->review}}</td><td>{{$review->pivot->create_date}}</td><td></td></tr> -->
      <p><span class ='left'>{{$review -> name}}</span>  <span class ='right' >{{$review->pivot->create_date}}</span></p><br>
      <p class="dotted" style="background-color: darkgray;" >{{$review -> pivot->review}}</p>
      <p><span class='right'> <a href="#">like</a> <a href="#">dislike</a></span><span class = 'left'><a href="#">Follow</a></span></p><br><br><br>
      
    @endforeach
  <!-- </table> -->
    <p><a href="#">POST YOUR OPINION</a></p>               
    <div class="d-flex">
      <div class="mx-auto">
        {{$reviews->links("pagination::bootstrap-4")}}
      </div>
    </div>
           
           



    

@endsection