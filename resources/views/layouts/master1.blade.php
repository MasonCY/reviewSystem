<!DOCTYPE html>
<html>
  <head>
    <title> @yield('title')</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" type="text/css" href="{{ asset("css/wp.css") }}">
  </head>
  
  <body> 
    <div class="container">
        <div class="row" id="navbar">
            <div class="col-md-3" ><a class="navLink" href='{{url('/')}}'> @yield('home')</a> </div>
            <div class="col-md-3 col-sm-3">@yield('follow')</a></div>
            <div class="col-md-3 col-sm-3" >@yield('follower')</div>  
            <div class="col-md-3 col-sm-3" >
            @auth 
                {{Auth::user()->name}} || {{Auth::user()->user_type}}
                <form method="POST" action="{{url('/logout')}}">
                  {{csrf_field()}}
                 <input type="submit" value="Logout"  class='logout'> 
                </form>
            @else
               <a href="{{url('login')}}">Log in</a> <br>
               <a href="{{route('register')}}">Register</a>


   @endauth

            </div> 

        </div>
    </div> 
    @yield('body')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>