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
@else
  <?php $uid = -1 ?>
  <?php $ppid = -1 ?>
@endauth
@endsection
@section('document')
@endsection
@section('body')
<h4>Phone detail:</h4>
 
<table>
    <tr><th>Name</th><th>Price</th><th>Make</th><th>Description</th><th>Url</th><th>Image</th></tr>
    <tr><td>{{$product->name}}</td> <td> {{$product->price}}</td><td> {{$product->manufacturer}}</td><td> {{$product->description}}</td><td> {{$product->url}}</td>
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

    @foreach($reviews as $review) 
    <?php $islike = -1; ?>
    <?php $ppid = $review->pivot->id; ?>
    <?php $followed_user_id = $review->pivot->user_id ?>
    <?php $rating = $review->pivot->rating;?>
    <?php $filename ="images/".strval($rating).'.png'?>
   
      <p><span class ='left'><a class="navLink" name='{{$ppid}}'>{{$review -> name}}</a> </span> &nbsp;&nbsp;&nbsp;  <img src='{{url("$filename")}}'  style="width:140px;height:20px; margin:0px 20px;">  <span class ='right' >{{$review->pivot->create_date}}</span></p>
      <p class="dotted" style="background-color: darkgray;" >{{$review -> pivot->review}}</p>
      <p>
      @auth
        
          @foreach($likes as $like)
              @if($like->pivot->review_id == $review->pivot->id and $like->pivot->user_id == $uid) 
                  @if($like->pivot->islike == 0)
                
                    <?php $islike = 0;?>
                  @else

                    <?php $islike = 1;?>
                  @endif
                  @break
              @endif
            @endforeach
    
       
        @if($islike == -1)

          <span class='right'> <a href='{{url("store_like/$product->id/$uid/$ppid")}}'>like</a> <a href='{{url("store_dislike/$product->id/$uid/$ppid")}}' >dislike</a></span>
        @else
          @if($islike == 1)
            <span class='right'><label>I like this post</label></a></span>
          @else
            <span class='right'><label>I do not like this post</label></a></span>
          @endif
        @endif
      @else
         <span class='right'> <a href='{{url("store_like/$product->id/$uid/$ppid")}}'>like</a> <a href='{{url("store_dislike/$product->id/$uid/$ppid")}}'>dislike</a></span>
      @endauth
      @if($review->pivot->user_id != $uid)
          @foreach($follows as $follow)
            <?php $followed = FALSE;?>
            @if($follow->user_id == $uid and $follow->followed_user_id == $followed_user_id)
              <?php $followed = TRUE ?>
              @break
            @endif
          @endforeach()
        
        @if($followed == FALSE)
          <span class = 'left'><a href='{{url("follow/$ppid/edit")}}'>Follow</a>
        @else
          <span class = 'left'>Followed
        @endif
      @else
        <span class = 'left'><a href="#"></a>
      @endif
       @auth
        @if(Auth::user()->user_type == 'Moderator')
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='{{url("review/$ppid/edit")}}'>Update</a>
          <form method="post" action='{{url("review/$ppid")}}'>
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input type="submit" value="Delete" class='delete'>
          </form>
        @elseif( $uid == $review->pivot->user_id )
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='{{url("review/$ppid/edit")}}'>Update</a>
          <form method="post" action='{{url("review/$ppid")}}'>
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input type="submit" value="Delete" class='delete'>
         </form>
        @endif
      @endauth
      </span></p><br><br><br>
      
    @endforeach
  @auth
      
    @if($nonAddedReview)
      <p><a href='{{url("add_review/$product->id/$uid")}}' name="mypage">POST YOUR OPINION</a></p> 
    @else
      <p>APPRECIATE FOR YOUR OPINION</p> 
    @endif
  @else
     <p><a href='{{url("add_review/$product->id/$uid")}}' name="mypage">POST YOUR OPINION</a></p> 
  @endauth
    <div class="d-flex">
      <div class="mx-auto">
        {{$reviews->links("pagination::bootstrap-4")}}
      </div>
    </div>

@endsection