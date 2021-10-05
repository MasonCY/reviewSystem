<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\User;
class ProductController extends Controller
{
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
            $products = Product::orderBy('id')->paginate(6);
            $images = Image::groupBy('product_id')->orderBy('product_id')->paginate(6);
       

     
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
                'name' => ['required', 'string', 'max:255'],
                'price' => 'required|numeric|gt:0',
                'manufacturer' =>'required |string|max:255',
                'description' => 'required'
        ]);
    }else{
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
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

        return redirect("product/$product->id");

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
        $reviews = $product->users()->paginate(5);
        $images = $product->images;
        $users = User::all();
        // dd($images);
  
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
                'name' => ['required', 'string', 'max:255'],
                'price' => 'required|numeric|gt:0',
                'manufacturer' =>'required |string|max:255',
                'description' => 'required'
        ]);
    }else{
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
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
        $reviews = $product->users()->paginate(5);
        $images = $product->images;
        $users = User::all();
        return view('pages/detail')->with('product',$product)->with('reviews',$reviews)->with('images',$images)->with('users',$users);

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
        $reviews = $product->users;
        $images = $product->images;

        foreach($reviews as $review)
        {
            $review->delete();
        }
        foreach($images as $image)
        {
            $image->delete();
        }
        $product->delete();
     return redirect(url("product"));

    }
}
