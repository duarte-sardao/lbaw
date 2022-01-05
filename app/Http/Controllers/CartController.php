<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{ 
  public function show(){
    $user = User::find(Auth::user()->id);
    $products = Cart::find(Auth::user()->id)->Products;
    $cart = array();

    $total = 0;
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

  public function addEntry(Request $request, $product_id)
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

  public function deleteEntry(Request $request, $product_id)
  {
    $entry = CartProduct::
      where('id_cart', '=', Auth::user()->id)
      ->where('id_product', '=', $product_id);

    dd($entry);

    $entry->delete();

    return redirect()->back();
  }

  public function incrementQuantity(Request $request, $product_id)
  {

  }

  public function empty()
  {
    $cart = Cart::find(Auth::user()->id)->Products;
    
    foreach($cart as $entry){
      $entry->delete();
    }

    return redirect()->back();
  }
}
?>
