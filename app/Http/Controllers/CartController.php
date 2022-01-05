<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\CartProduct;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{ 
  public function show(){
    $user = Customer::find(Auth::user()->id);
    $products = Cart::find(Auth::user()->id)->Products;
    $total = 0;
    
    $cart = array();

    foreach($products as $product){ 
      array_push(
        $cart, 
        [
          'product' => $product, 
          'quantity' => $product->pivot->quantity
        ]);

      $total += $product->price * $product->pivot->quantity;
    }

    return view('pages.profile.cart', [
      'user' => $user,
      'cart' => $cart,
      'total' => $total,
    ]);
  }

  public function addNewEntry(Request $request, $product_id)
  {
    $entry = new CartProduct();

    $entry->id_cart = Auth::user()->id;
    $entry->id_product = (int)$product_id;
    $entry->quantity = 0;
    
    $entry->quantity++;
    $entry->save();

    //dd($entry);
    return redirect()->back();
  }

  public function incrementQuantity(Request $request, $product_id)
  {

  }

  public function empty()
  {
    $cart = CartProduct::where('id_cart', '=', Auth::user()->id);
    
    foreach($cart as $product){
      $product->delete();
    }

    return redirect()->back();
  }
}
?>
