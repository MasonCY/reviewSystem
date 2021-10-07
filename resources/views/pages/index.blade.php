@extends('layouts/master1')
@section('title')
    products
@endsection
@section('home') 
  <label class='home'>Home</label>
@endsection
@section('follow')
        @auth
            <a class="navLink" href ="product/create"> Create </a>
        @endauth
 
@endsection
@section('follower')
@auth
  <?php $uid = Auth::user()->id?>
  <a class="navLink" href='{{url("follow/$uid")}}'>Follow</a> 
@endauth
@endsection
@section('document')
@endsection
@section('body')
    <div></div>

    <h4 class="home_h4">Products information:</h4>
    <div class="clearfix">
            @foreach($products as $product)
                    <?php $tid=-1;?>
                    @foreach($images as $image)
                         @if($product->id == $image->product_id)
                            <?php $tid=$image->product_id;?>
                            <div class="img-container">
                              <figure> 
                                
                                <img src="{{url($image->name)}}" alt="product image" style="width:300px;height:300px;">
                                <figcaption class='image_link'><a href="product/{{$product->id}}"> {{ $product->name }}</a></figcaption>    
                             </figure>
                            </div>
                          
                          @break
                            <!-- <div> </div> -->
                      
                         @endif 
                   @endforeach
                   @if($tid == -1)
                        <div class="img-container">
                              <figure> 
                                
                                <img src="//:0"  style="width:300px;height:300px;">
                                <figcaption class='image_link'><a href="product/{{$product->id}}"> {{ $product->name }}</a></figcaption>    
                             </figure>
                            </div>

                   @endif
            @endforeach
    </div>
    
  

    <div class="d-flex">
      <div class="mx-auto">
        {{$products->links("pagination::bootstrap-4")}}
      </div>
    </div>
  

@endsection