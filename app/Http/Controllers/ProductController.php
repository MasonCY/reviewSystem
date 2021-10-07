<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\User;
use App\Models\Review;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
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
    
        // $products = Product::all();
        // $images = Image::groupBy('product_id')->get();
            $products = Product::orderBy('created_at','desc')->paginate(6);
            $images = Image::groupBy('product_id')->get();
       

     
        return view('pages/index')->with('products', $products)->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages/phone_add');
    }
    public function add_review($pid,$uid)
    {
        $product = Product ::find($pid);
        if($uid == -1){
            return redirect(url("product/$product->id"));
        }
       
        //
        return view('pages/add_review_interface')->with('pid',$pid)->with('uid',$uid);
    }
    public function store_review(Request $request)
    {
        $request->validate([
            'review' => ['required', 'string', 'min:5']
    ]);

        $user = User::find($request->uid);
        $product = Product::find($request->pid);
        $tzobj = new \DateTimeZone('Australia/Brisbane');
        // $date = date("Y-m-d H:i:s");
        $dt = new \DateTime("now", $tzobj);
        $timestamp = time();
        $dt->setTimestamp($timestamp);
        $date = $dt->format("Y-m-d H:i:s");
    
        $user->products()->attach($product->id,['likes'=>0,'dislikes'=>0,'added_review'=>1,'review'=>$request->review,'rating'=>$request->rating,'create_date'=>$date]);
       
        return redirect(url("product/$product->id"));
  
    }

    public function store_like($pid, $uid,$rid){
        $product = Product ::find($pid);
        if($uid == -1){
            return redirect(url("product/$product->id"));
        }
       
        $user = User::find($uid);
        
        // $user->reviews()->updateExistingPivot($rid,[
        //           'islike'=>1
        // ]);
  
        $user->reviews()->attach($rid,['islike'=>1]);
        $review = Review::find($rid);
        $review->likes = $review->likes + 1;
        // return redirect(url("product/$product->id"));
        $strid = '#';
        $strid = $strid.strval($rid);
        return redirect(url()->previous().$strid);
    }

    public function store_dislike($pid, $uid, $rid){
        $product = Product ::find($pid);
        if($uid == -1){
            return redirect(url("product/$product->id"));
        }
      
        $user = User::find($uid);
        $user->reviews()->attach($rid,['islike'=>0]);
        $review = Review::find($rid);
        $review->likes = $review->dislikes + 1;
        $strid = '#';
        $strid = $strid.strval($rid);
        return redirect(url()->previous().$strid);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->url)){
            $request->validate([
                'name' => ['required', 'string', 'max:255','unique:products'],
                'price' => 'required|numeric|gt:0',
                'manufacturer' =>'required |string|max:255',
                'description' => 'required'
        ]);
    }else{
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:products'],
            'price' => 'required|numeric|gt:0',
            'manufacturer' =>'required |string|max:255',
            'description' => 'required',
            'url' => ['url']
    ]);
    }
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'manufacturer' => $request->manufacturer,
            'description' => $request->description,
            'url' => $request->url,
        ]);
        $product->save();

        return redirect(url("product/$product->id"));

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
        $product = Product::find($id);
        $reviews = $product->users()->orderBy('create_date','desc')->paginate(5);
        $images = $product->images;
        $follows = Follow::all();

        $users = User::all();
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            $likes = $user->reviews;
           
            $treviews=$product->users;   
            $nonAddedReview = TRUE;
            foreach($treviews as $treview){
                if(Auth::user()->id == $treview->pivot->user_id){
                    $nonAddedReview = FALSE;
                    break;
                }
            }
            
            return view('pages/detail')->with('product',$product)->with('reviews',$reviews)->with('images',$images)->with('users',$users)->with('likes',$likes)->with('nonAddedReview',$nonAddedReview)->with('follows',$follows);
        }
     
  
        return view('pages/detail')->with('product',$product)->with('reviews',$reviews)->with('images',$images)->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('pages/update_product_interface')->with('product', $product);

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
       if(empty($request->url)){
            $request->validate([
                'name' => 'required |string|max:255|unique:products,name'.($id ? ",$id" : ''),
                'price' => 'required|numeric|gt:0',
                'manufacturer' =>'required |string|max:255',
                'description' => 'required'
        ]);
    }else{
        $request->validate([
            'name' =>  'required |string|max:255|unique:products,name'.($id ? ",$id" : ''),
            'price' => 'required|numeric|gt:0',
            'manufacturer' =>'required |string|max:255',
            'description' => 'required',
            'url' => ['url']
    ]);

    }
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->manufacturer = $request->manufacturer;
        $product->description = $request->description;
        $product->url = $request->url;

        $product->save();
        return redirect(url("product/$product->id"));
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
        $product = Product::find($id);
        $images = $product->images;
        $product->users()->detach();
        $product->images()->delete();
        $product->delete();
     return redirect(url("product"));

    }
}
