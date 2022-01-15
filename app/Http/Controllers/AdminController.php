<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    if (!is_numeric($stock) && $stock > 0){
      
    }

    if(!is_numeric($size) && !is_null($floor)){
      array_push($errors, 'Floor does not match the specified format.');
    }

    if(count($errors) != 0){
      return view('pages.profile.user_profile', 
      [
        'user' => User::find(Auth::id()),
        'content' => 'partials.profile.address_form',
        'entries' => [],
        'breadcrumbs' => [
          route('profile') => Auth::user()->username,
          route('addresses') => 'Addresses'
        ],
        'current' => 'New',
        'errors' => $errors
      ]);
    }

    /***********************************************************/
    
    //Insert on the address table first and then...
    $address = new Address;

    $address->streetname = $streetName;
    $address->streetnumber = $streetNumber;
    $address->aptnumber = $aptNumber;
    $address->floor = $floor;
    $address->zipcode = $zipcodeNumber.' '.$zipcodeLocation;

    $address->save();

    //... insert on intermediate table
    $customer = $this->getCustomer(); 
    $customerAddress = new CustomerAddress;

    $customerAddress->id_customer = $customer->id;
    $customerAddress->id_address = $address->id;

    $customerAddress->save();

    return redirect(route('addresses'));
  }

  public function deleteProduct($product_id){
    
  }
}
?>