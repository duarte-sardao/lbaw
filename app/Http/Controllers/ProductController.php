<?php

namespace App\Http\Controllers;

use App\Models\CPU;
use App\Models\Product;
use App\Models\GPU;
use App\Models\Motherboard;
use App\Models\Cooler;
use App\Models\PowerSupply;
use App\Models\Storage;
use App\Models\PcCase;
use App\Models\Other;
use App\Models\Review;

use App\Models\Customer;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{ 
  public function search(Request $request){
    $wildcard = $request->input('search');

    $firstQuery = Product::where('name', 'like', '%'.$wildcard.'%');
    $secondQuery = Product::where('brand', 'like', '%'.$wildcard.'%');
    $thirdQuery = Product::where('description', 'like', '%'.$wildcard.'%');

    $results = $firstQuery
    ->union($secondQuery)
    ->union($thirdQuery)
    ->get();

    return view('pages.products.products_list', 
    [
      'products' => $results,
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => 'Search'
    ]);
  }

  public function getAllProducts(){
    return view('pages.products.products_list', [
      'products' => Product::all(),
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => null
    ]);
  }

  public function getCategoryProducts($category){
    $products = Product::where('category', '=', $category)->get();
    /* dd($products); */
    return view('pages.products.products_list', 
    [
      'products' => $products,
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => $category
    ]);
  }
  
  public function showProduct($id){
    $product = Product::find($id);
    $entries = Review::where('id_product', '=', $id)->get();
    $details = null;

    if(Auth::guest())
      $user = null;

    else
      $user = User::find(Auth::user()->id);

    $reviews = array();
    foreach($entries as $entry){
      $customer = Customer::find($entry->id_customer);
      $user = User::find($customer->id_user);
      //dd($customer, $user);
      array_push($reviews, 
      [
        'user' => $user,
        'content' => $entry
      ]);
    }

    //dd($reviews);
    
    return view('pages.products.product', 
    [
      'user' => $user,
      'product' => $product,
      'details' => $details,
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => $product->name,
      'reviews' => $reviews
    ]);
  }

  public function upvote($id){
    $review = Review::find($id);
    $review->yesvotes++;
    $review->save();

    return redirect()->back();
  }

  public function downvote($id){
    $review = Review::find($id);
    $review->novotes++;
    $review->save();

    return redirect()->back();
  }

  public function postReview(Request $request, $user_id, $product_id){
    $customer = Customer::where('id_user', '=', $user_id)->first();
    $review = new Review;

    //dd($request);

    $review->rating = $request->input('rating');
    $review->text = $request->input('comment');
    $review->id_customer = $customer->id;
    $review->id_product = $product_id;

    $review->save();

    return redirect()->back();
  }

  public function filter(Request $request){
    //dd($request);
    
    //stock
    $stock = $request->input('stock');
    $price = $request->input('price');
    $rating = $request->input('rating');
    
    $char = '>';
    if($stock == "off")
      $char = '=';

    $results = Product::
    where('stock', $char, 0)
    ->where('price', '<=', $price)
    ->where('rating', '>=', $rating)
    ->get();

    return view('pages.products.products_list', 
    [
      'products' => $results,
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => 'Search'
    ]);
  }
}
?>