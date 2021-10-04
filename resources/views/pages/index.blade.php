@extends('layouts/master1')
@section('title')
    products
@endsection
@section('home') 
<label class="home">Home</label> 
@endsection
@section('follow')
    Follow
@endsection
@section('follower')
    Follower
@endsection
@section('document')
@endsection
@section('body')
    <div></div>
    <h4 class="home_h4">Products information:</h4>
    <div class="clearfix">
            @foreach($products as $product)
                    @foreach($images as $image)
                         @if($product->id == $image->product_id)
                            <div class="img-container">
                              <figure> 
                                
                                <img src="{{url($image->name)}}" alt="product image" style="width:300px;height:300px;">
                                <figcaption class='image_link'><a href="product/{{$product->id}}"> {{ $product->name }}</a></figcaption>    
                             </figure>
                            </div>

                            <!-- <div> </div> -->
                      
                         @endif 
                   @endforeach
              
            @endforeach
    </div>
    
        @auth
            <p><a href ="product/create"> Create </a></p>
        @endauth

    <div class="d-flex">
      <div class="mx-auto">
        {{$products->links("pagination::bootstrap-4")}}
      </div>
    </div>
  

@endsection