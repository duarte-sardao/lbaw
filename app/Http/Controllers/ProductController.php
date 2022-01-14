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
    $reviews = Review::where('id_product', '=', $id)->get();
    $details = null;
    
    return view('pages.products.product', 
    [
      'product' => $product,
      'details' => $details,
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => $product->name,
      'reviews' => $reviews
    ]);
  }
}
?>