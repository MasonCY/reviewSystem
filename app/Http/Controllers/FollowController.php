<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class FollowController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function show_reviews($id)
    {
        $reviews = User::find($id)->products;
        return view('pages/show_reviews')->with('reviews',$reviews);
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
        $user = User::find($id);
        $follows = $user->follows;
        $users = User::all();
        return view('pages/follow')->with('follows',$follows)->with('users',$users);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id == -1){
            return redirect(url("product/$product->id"));
        }
        //
        $auth_id = Auth::user()->id;
        $follow = Follow::create([
            'user_id' => $auth_id,
            'followed_user_id' => $id
        ]
        );
        $follow->save();
        return redirect(url()->previous());
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
     

    }
    public function follow_delete($id)
    {
        $follow = Follow::find($id);
        $follow->delete();
        return redirect(url()->previous());
    }
}
