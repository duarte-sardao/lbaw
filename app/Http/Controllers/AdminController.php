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
use App\Models\Customer;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function showAllUsers(){
    $admin = User::find(Auth::id());
    $users = User::all();   

    return view('pages.profile.user_profile', [
      'user' => $admin,
      'entries' => $users,
      'content' => 'partials.admin.list_users',
      'breadcrumbs' => [route('profile') => $admin->username],
      'current' => 'Users'
    ]);
  }

  public function showAllOrders(){
    $admin = User::find(Auth::id());
    $orders = Purchase::all();

    return view('pages.profile.user_profile', [
      'user' => $admin,
      'entries' => $orders,
      'content' => 'partials.admin.list_orders',
      'breadcrumbs' => [route('profile') => $admin->username],
      'current' => 'Orders'
    ]);
  }
  
  public function showAllProducts(){
    $admin = User::find(Auth::id());
    $products = Product::all();   

    return view('pages.profile.user_profile', [
      'user' => $admin,
      'entries' => $products,
      'content' => 'partials.admin.list_products',
      'breadcrumbs' => [route('profile') => $admin->username],
      'current' => 'Products'
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
      'breadcrumbs' => [
        route('profile') => Auth::user()->username,
        route('showAllUsers') => 'Users',
      ],
      'entries' => [],
      'current' => 'Create User'
    ]);
  }  

  public function createUser(Request $request){
    $errors = array();
    
    $username = $request->input('username');
    $email = $request->input('email');
    $password = $request->input('password');
    $phone = $request->input('phone');
    $isadmin = $request->input('admin');

    if(strlen($username) < 8)
      array_push($errors, "The username is too small (must be at least 8 characters long).");

    $regex = '/[a-zA-Z0-9]+@[a-zA-Z]+(.[a-zA-Z]+)+/';
    if(!preg_match($regex, $email))
      array_push($errors, "The email doesn't fit the required format.");

    if(strlen($password) < 8)
      array_push($errors, "The password is too small (must be at least 8 characters long).");

    if(count($errors) != 0){
      return view('pages.profile.user_profile', 
      [
        'user' => User::find(Auth::id()),
        'content' => 'partials.admin.user_form',
        'breadcrumbs' => [route('profile') => Auth::user()->username],
        'entries' => [],
        'current' => 'Create User',
        'errors' => $errors
      ]);
    }     

    $user = new User;

    $user->username = $username;
    $user->email = $email;
    $user->password = bcrypt($password);
    $user->phone = $phone;
    $isadmin == "false" ? $user->isadmin = false : $user->isadmin = true;
    $user->save();
    

    if(!($user->isadmin)){
      $customer = new Customer;
      $customer->id_user = $user->id;
      $customer->save();
    }

    return redirect(route('showAllUsers'));
  }

  public function deleteUser($user_id){
    
  }
  
  public function getCreateProductForm(){
    return view('pages.profile.user_profile', 
    [
      'user' => User::find(Auth::id()),
      'content' => 'partials.admin.product_form',
      'breadcrumbs' => [route('profile') => Auth::user()->username],
      'entries' => [],
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


    $field1 = $request->input('field1');
    $field2 = $request->input('field2');
    $field3 = $request->input('field3');
    $field4 = $request->input('field4');
    $field5 = $request->input('field5');
    
    //... insert on intermediate table
    switch ($category) {
      case "CPU":
        $this->addCpu($field1, $field2, $field3, $field4, $field5, $product->id);
        break;
      case "GPU":
        $this->addGpu($field1, $field2, $field3, $field4, $field5, $product->id);
        break;
      case "Motherboard":
        $this->addMotherboard($field1, $field2, $product->id);
        break;
      case "PcCase":
        $this->addPcCase($field1, $field2, $field3, $product->id);
        break;
      case "PowerSupply":
        $this->addPowerSupply($field1, $field2, $field3, $product->id);
        break;
      case "Cooler":
        $this->addCooler($field1, $product->id);
        break;
      case "Storage":
        $this->addStorage($field1, $field2, $product->id);
        break;
      case "Other":
        $this->addOther($product->id);
        break;
    }
    
    return redirect(route('showAllProducts'));
  }

  public function deleteProduct($product_id){
    Product::find($product_id)->delete();
    
    return redirect()->back();
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