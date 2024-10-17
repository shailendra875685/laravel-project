<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
   // Fetch all product
   public function index(){
      // $products = Product::orderBy('created_at','DESC')->paginate(4);
      $products = Product::orderBy('created_at','DESC')->simplePaginate(4);
      return view('products')->with('products',$products);
   }

   // Fetch own products
   public function showOwnProduct(){
      $products = Product::where('user_id',Auth::id())->orderBy('created_at','DESC')->paginate(8);
      return view('dashboard')->with('products',$products);
   }

   // Fetch a product by id
   public function show($id){
      $product = Product::findOrfail($id);
      return view('product')->with('product',$product);
   }

   // Function to store product information on the database
   public function store(Request $request){
      // return $request;
      
      // validation the inputs
     $val =  $request->validate([
         'title'     =>'required',
         'desc-sm'   =>'required',
         'desc-full' =>'required',
         'price'     =>'required|numeric',
         'img'       =>'required|image'
      ],[
         'title.required' =>'Please enter a title',
         'desc-sm.required' =>'Please enter a short description',
         'desc-full.required' =>'Please enter a full description',
         'price.required' =>'Please enter the product price',
         'price.numeric' =>'The price should be a number',
         'img.required'  =>'Please upload an image',
         'img.image'  =>'Only image upload',
         ],[
         'desc-sm'   =>'short description',
         'desc-full' =>'full description',
         'img'       =>'product image'
      ]);
      // Upload the image
      $path = $request->file('img')->store('product_images');

      // Insert data into the products table
      $product = new Product();

      $product->title  = $request->input('title');
      $product->short_desc  = $request->input('desc-sm');
      $product->long_desc  = $request->input('desc-full');
      $product->price  = $request->input('price');
      $product->user_id  = Auth::id();
      $product->image_url  = $path;

      $product->save();

      return redirect('/product/'.$product->id);
   }

   public function deleteProduct($id){
      $product = Product::select('image_url')->findOrfail($id);

      if(file_exists(public_path($product->image_url))){
         unlink($product->image_url);
      }
      
      Product::findOrfail($id)->delete();
      return redirect()->route('all.product');
   }


   public function updateProduct($id){
      $product =  Product::findOrfail($id);
      return view('updateProduct',['product'=>$product]);
   }

   public function editProduct(Request $request,$id){

      $request->validate([
         'price'     =>'numeric',
      ]);
      
      $product = Product::findOrfail($id);

      if($request->hasFile('img')){

         if(file_exists(public_path($product->image_url))){
            unlink(public_path($product->image_url));
         }
   
         $path = $request->img->store('product_images');
         $product->image_url = $path;

      }
      
      if(!empty($request->input('title'))){
         $product->title = $request->input('title');
      }

      if(!empty($request->input('desc-sm'))){
         $product->short_desc = $request->input('desc-sm');
      }

      if(!empty($request->input('desc-full'))){
         $product->long_desc = $request->input('desc-full');
      }

      if(!empty($request->input('price'))){
         $product->price = $request->input('price');
      }

      $product->save();

      return redirect('/product/'.$product->id);


      // Product::find($id)->update([
      //    'title' => $request->input('title'),
      //    'short_desc' => $request->input('desc-sm'),
      //    'long_desc' => $request->input('desc-full'),
      //    'price' => $request->input('price'),
      //    'image_url' => $path,
      // ]);

      // return redirect()->route('all.product')->with('success','Product Updated Successfully.');
 
   }

  

   

 
}
