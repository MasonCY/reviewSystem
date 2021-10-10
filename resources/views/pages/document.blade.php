@extends('layouts/master')
@section('title')
  Products
@endsection
@section('home')
  Home
@endsection
@section('footer')
@endsection
@section('body')
  <h4>Reflection:</h4>

  <table>
    <tr><td> 1. An ER diagram for the database. Note: many-to-many relationships must be broken down into
one-to-many:</td></tr>
    <tr><td align="center">
  
       <img src="datastructure.png"  alt="Photo">
    </td></tr>
    <tr><td>2.Complete the task :</td></tr>
  <tr><td>
         I have completed all tasks, but it is still a bit challenge to me especially in 
  deal with likes and dislikes there is need for extra Pivot table which is users_review, 
  because user can like many reviews, review can be liked by many users we need a pivot table 
  between them, but reviews is also a pivot table, it takes some time to solve this problem.  
    </td></tr>

    <tr><td>3. Reflection:</td></tr>
    <tr><td>
    I just get started from thinking about the data structure and then draw the ER diagram,
    after completing the ER diagram, Use php artisan command to create table seed initial data,
    and create the controller, model and review, and get started to code. I tested the code
    all the time, and I often used dd() function to find the problem when I run into the
     trouble, the thing I could improve is the efficiency to interact with database. 
        </td></tr>
        <tr><td>4.Recommendation:</td></tr>
        <tr><td>
        Recommend others users to current user which they are more likely to follow. 
        This  is based on  checking if current user like the review posted by the 
        other users but not followed them.
        </td></tr>
  </table>

@endsection