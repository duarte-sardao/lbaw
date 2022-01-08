<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CPU;
use App\Models\GPU;
use App\Models\Motherboard;
use App\Models\Cooler;
use App\Models\PowerSupply;
use App\Models\Storage;
use App\Models\PcCase;
use App\Models\Other;

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
    /* dd($category); */
    $products = array();
    switch($category){
      case "CPU": $products = CPU::all(); break;
      case "GPU": $products = GPU::all(); break;
      case "Motherboard": $products = Motherboard::all(); break;
      case "Storage": $products = Storage::all(); break;
      case "PcCase": $products = PcCase::all(); break;
      case "Cooler": $products = Cooler::all(); break;
      case "PowerSupply": $products = PowerSupply::all(); break;
      case "Other": $products = Other::all(); break;
    }

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
    $details = null;
    
    return view('pages.products.product', 
    [
      'product' => $product,
      'details' => $details,
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => $product->name
    ]);
  }
}
?>