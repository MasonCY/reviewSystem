<!DOCTYPE html>
<html>
  <head>
    <title> @yield('title')</title>
    <meta charset="utf-8">
  
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
   
    
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset("css/wp.css") }}">
  </head>
  <body> 
    <div class="grid-container">
    <div></div>
    <div class='nav'>
      <a class="navLink" href='{{url('/')}}'> @yield('home')</a>
      @auth
     
      <span class="right" >{{Auth::user()->name}}</span>
      <form method="POST" action="{{url('/logout')}}">
        {{csrf_field()}}
       <span class = "right" style="float:right;" > <input type="submit" value="Logout" class='logout'> </span>
      </form>
    @else
      <span class="right" >
      <a href="{{url('login')}}">Log in</a> <br>
      <a href="{{route('register')}}">Register</a>
      </span>

    @endauth
    </div>
    <div></div>

    @yield('body')
  </body>
</html>