<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{ 
  public function showAddresses(){
    
  }

  public function showOrders(){

  }

  public function showWishlist(){

  }

  public function showCart(){
    $user = Customer::find(Auth::user()->id);
    $products = Cart::find(Auth::user()->id)->Products;
    $total = 0;
    
    $cart = array();
    $quantities = array();

    foreach($products as $product){ 
      array_push($cart, $product);
      array_push($quantities, $product->pivot->quantity);
      $total += $product->price * $product->pivot->quantity;
    }

    return view('pages.profile.cart', [
      'user' => $user,
      'cart' => $cart,
      'total' => $total,
      'quantities' => $quantities
    ]);
  }
}
?>