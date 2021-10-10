<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except'=>['index','show']]);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $likes = $user->reviews;
        $follows = $user->follows;
        $users = User::all();

        return view('pages/recommendation')->with('likes',$likes)->with('follows',$follows)->with('users',$users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
  
        $review = Review::find($id);
              // authenticantion check for user type
        if(Auth::user()->user_type != 'Moderator' and $review->user_id != Auth::user()->id)
        {
            return redirect(url()->previous());
        }

        $path = url()->previous();
        return view('pages/update_review_interface')->with('review', $review)->with('path',$path);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'review' => ['required', 'string', 'min:5']
    ]);
    $review = Review::find($id);

    if(Auth::user()->user_type != 'Moderator' and $review->user_id != Auth::user()->id)
    {
        return redirect(url()->previous());
    }


    $review -> rating = $request -> rating;
    $review -> review = $request -> review;
    $review -> save();
    $strid = '#';
    $strid = $strid.strval($id);
    $path = $request->destination;

    return redirect($path.$strid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        if(Auth::user()->user_type != 'Moderator' and $review->user_id != Auth::user()->id)
        {
            return redirect(url()->previous());
        }
        //
     
        $pid = $review->product_id;
        $review->users()->detach();
        $review->delete();
        return redirect(url("product/$pid"));

    }
}
