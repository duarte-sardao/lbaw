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
use Illuminate\Support\Facades\DB;

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

  public function getCategoryProducts($category){
    $results = $category::all();

    return view('pages.products.products_list', ['results' => $results]);
  }
  
  public function showProduct($id){
    $product = Product::find($id);
    $details = $this->retrieveProductDetails($id);
    
    return view('pages.products.product', [
      'product' => $product,
      'details' => $details
    ]);
  }
  
  public function retrieveProductDetails($id){
    /* if(CPU::find($id)->exists()) return $this->retrieveCpuDetails($id);
    else if(GPU::find($id)->exists()) return $this->retrieveGpuDetails($id);
    else if(Motherboard::find($id)->exists()) return $this->retrieveMotherboardDetails($id);
    else if(Cooler::find($id)->exists()) return $this->retrieveCoolerDetails($id);
    else if(PowerSupply::find($id)->exists()) return $this->retrievePowerSupplyDetails($id);
    else if(Storage::find($id)->exists()) return $this->retrieveStorageDetails($id);
    else if(PcCase::find($id)->exists()) return $this->retrievePcCaseDetails($id);
    else return $this->retrieveOtherDetails($id); */
  }
    

  public function retrieveCpuDetails($id){
    $product = Cpu::find($id);
    return null;
  }
  
  public function retrieveGpuDetails($id){
    $product = Gpu::find($id);
    return null;
  }
  
  public function retrieveMotherboardDetails($id){
    $product = Motherboard::find($id);
    return null;
  }
  
  public function retrieveCoolerDetails($id){
    $product = Cooler::find($id);
    return null;
  }
  
  public function retrievePowerSupplyDetails($id){
    $product = PowerSupply::find($id);
    return null;
  }
  
  public function retrieveStorageDetails($id){
    $product = Storage::find($id);
    return null;
  }
  
  public function retrievePcCaseDetails($id){
    $product = PcCase::find($id);
    return null;
  }
  
  public function retrieveOtherDetails($id){
    $product = Other::find($id);
    return null;
  }
}
?>