<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CPU;
use App\Models\Cooler;
use App\Models\Product;
use App\Models\GPU;
use App\Models\Motherboard;
use App\Models\PowerSupply;
use App\Models\Storage;
use App\Models\PcCase; 
use App\Models\Other;
use App\Models\Purchase;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function showAllUsers(){
    $admin = User::find(Auth::id());
    $users = User::all();   

    return view('pages.admin.user_management', [
      'users' => $users,
      'admin' => $admin,
      'breadcrumbs' => [route('profile') => $admin->name],
      'current' => null
    ]);
  }

  public function showAllOrders(){
    $admin = User::find(Auth::id());
    $products = Product::all();   

    return view('pages.admin.product_management', [
      'products' => $products,
      'admin' => $admin,
      'breadcrumbs' => [route('profile') => $admin->name],
      'current' => null
    ]);
  }
  
  public function showAllProducts(){
    $admin = User::find(Auth::id());
    $orders = Purchase::all();

    return view('pages.admin.order_management', [
      'orders' => $orders,
      'admin' => $admin,
      'breadcrumbs' => [route('profile') => $admin->name],
      'current' => null
    ]);
  }

  public function editUser(Request $request, $product_id){
    
  }

  public function editOrder(Request $request, $product_id){

  }

  public function editProduct(Request $request, $product_id){

  }
  
  public function getCreateUserForm(){
    return view('pages.profile.user_profile', 
    [
      'user' => User::find(Auth::id()),
      'content' => 'partials.admin.user_form',
      'breadcrumbs' => [route('profile') => Auth::user()->username],
      'current' => 'Create User'
    ]);
  }  

  public function createUser(Request $request){
    
  }

  public function deleteUser($user_id){
    
  }
  
  public function getCreateProductForm(){
    return view('pages.profile.user_profile', 
    [
      'user' => User::find(Auth::id()),
      'content' => 'partials.admin.product_form',
      'breadcrumbs' => [route('profile') => Auth::user()->username],
      'current' => 'Create Product'
    ]);
  }  

  public function createProduct(Request $request){
     //$this->authorize('add', Auth::user());
    $errors = array();
    $name = $request->input('name');
    $category = $request->input('category');
    $price = $request->input('price');
    $size = $request->input('size');
    $stock = $request->input('stock');
    $brand = $request->input('brand');
    //$image =
    $description = $request->input('description');

    /********************* INPUT VALIDATION ********************/

    if(!is_numeric($price)){
      array_push($errors, 'Price does not match the specified format.');
    }

    if (!is_numeric($stock) && $stock < 0){
      array_push($errors, 'Stock does not match the specified format or is negative.');
    }


    if(count($errors) != 0){
      return view('pages.profile.user_profile', 
      [
        'user' => User::find(Auth::id()),
        'content' => 'partials.admin.product_form',
        'entries' => [],
        'breadcrumbs' => [
          route('profile') => Auth::user()->username,
          route('showAllProducts') => 'Addresses'
        ],
        'current' => 'Create Product',
        'errors' => $errors
      ]);
    }

    /***********************************************************/
    
    //Insert on the product table first and then...
    $product = new Product;

    $product->name = $name;
    $product->category = $category;
    $product->price = $price;
    $product->size = $size;
    $product->stock = $stock;
    $product->brand = $brand;
    $product->description = $description;

    $product->save();


    $campo1 = $request->input('campo1');
    $campo2 = $request->input('campo2');
    $campo3 = $request->input('campo3');
    $campo4 = $request->input('campo4');
    $campo5 = $request->input('campo5');
    
    //... insert on intermediate table
    switch ($category) {
      case "CPU":
        $this->addCpu($campo1, $campo2, $campo3, $campo4, $campo5, $product->id);
        break;
      case "GPU":
        $this->addGpu($campo1, $campo2, $campo3, $campo4, $campo5, $product->id);
        break;
      case "Motherboard":
        $this->addMotherboard($campo1, $campo2, $product->id);
        break;
      case "PcCase":
        $this->addPcCase($campo1, $campo2, $campo3, $product->id);
        break;
      case "PowerSupply":
        $this->addPowerSupply($campo1, $campo2, $campo3, $product->id);
        break;
      case "Cooler":
        $this->addCooler($campo1, $product->id);
        break;
      case "Storage":
        $this->addStorage($campo1, $campo2, $product->id);
        break;
      case "Other":
        $this->addOther($product->id);
        break;
    }
    
    return redirect(route('showAllProducts'));
  }

  public function deleteProduct($product_id){
    
  }


  // Auxiliary functions
  public function addCpu($basefreq, $turbofreq, $socket, $threads, $cores, $id){
    $cpu = new CPU;
    
    $cpu->basefreq = $basefreq;
    $cpu->turbofreq = $turbofreq;
    $cpu->socket = $socket;
    $cpu->threads = $threads;
    $cpu->cores = $cores;
    $cpu->id_product = $id;
    
    $cpu->save();
  }
  
  public function addGpu($memory, $coreClock, $boostclock, $hdmiPorts, $displayPorts, $id){
    $gpu = new GPU;
    
    $gpu->memory = $memory;
    $gpu->coreClock = $coreClock;
    $gpu->boostclock = $boostclock;
    $gpu->hdmiPorts = $hdmiPorts;
    $gpu->displayPorts = $displayPorts;
    $gpu->id_product = $id;

    $gpu->save();
  }
  
  public function addNotherboard($chipset, $type, $id){
    $motherboard = new Motherboard;

    $motherboard->chipset = $chipset;
    $motherboard->type = $type;
    $motherboard->id_product = $id;

    $motherboard->save();
  }

  public function addPcCase($color, $weight, $type, $id){
    $PcCase = new PcCase;

    $PcCase->color = $color;
    $PcCase->weight = $weight;
    $PcCase->type = $type;
    $PcCase->id_product = $id;

    $PcCase->save();
  }
    
  public function addPowerSupply($wattage, $certification, $type, $id){
    $PowerSupply = new PowerSupply;
    
    $PowerSupply->wattage = $wattage;
    $PowerSupply->certification = $certification;
    $PowerSupply->type = $type;
    $PowerSupply->id_product = $id;

    $PowerSupply->save();
  }

  public function addCooler($type, $id){
    $cooler = new Cooler;

    $cooler->type = $type;
    $cooler->id_product = $id;

    $cooler->save();
  }

  public function addStorage($capacity, $type, $id){
    $Storage = new Storage;

    $Storage->capacity = $capacity;
    $Storage->type = $type;
    $Storage->id_product = $id;

    $Storage->save();
  }

  public function addOther($id){
    $Other = new Other;

    $Other->id_product = $id;

    $Other->save();
  }
}
?>