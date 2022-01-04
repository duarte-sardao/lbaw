<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{ 
  public function search(Request $request){
    $wildcard = $request->input('search');

    $firstQuery = Product::where('name', 'like', '%'.$wildcard.'%');
    $secondQuery = Product::where('brand', 'like', '%'.$wildcard.'%');
    $thirdQuery = Product::where('description', 'like', '%'.$wildcard.'%');

    $results = $firstQuery->union($secondQuery)->union($thirdQuery)->get();

    return view('pages.products.products_list', ['results' => $results]);
  }

  public function getAllProducts(){
    return view('pages.products.products_list', ['results' => Product::all()]);
  }
}
?>