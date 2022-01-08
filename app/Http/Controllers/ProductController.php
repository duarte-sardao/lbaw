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
      'results' => $results,
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => 'Search'
    ]);
  }

  public function getAllProducts(){
    return view('pages.products.products_list', [
      'results' => Product::all(),
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => null
    ]);
  }

  public function getCategoryProducts($category){
    /* dd($category); */
    $results = array();
    switch($category){
      case "CPU": $results = CPU::all(); break;
      case "GPU": $results = GPU::all(); break;
      case "Motherboard": $results = Motherboard::all(); break;
      case "Storage": $results = Storage::all(); break;
      case "PcCase": $results = PcCase::all(); break;
      case "Cooler": $results = Cooler::all(); break;
      case "PowerSupply": $results = PowerSupply::all(); break;
      case "Other": $results = Other::all(); break;
    }

    /* dd($results); */
    return view('pages.products.products_list', [
      'results' => $results,
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => $category
    ]);
  }
  
  public function showProduct($id){
    $product = Product::find($id);
    $details = null;
    
    return view('pages.products.product', [
      'product' => $product,
      'details' => $details,
      'breadcrumbs' => [route('allProducts') => 'Products'],
      'current' => $product->name
    ]);
  }
}
?>