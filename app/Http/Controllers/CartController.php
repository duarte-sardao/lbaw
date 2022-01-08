<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{ 
  private function getCart(){
    return Cart::where('id_customer', '=', Auth::id())
    ->where('isactive', '=', true)
    ->first();
  }

  private function getCartEntry($id){
    //Gets the active cart of the currently authenticated user
    $cart = $this->getCart();

    //Gets the entry of the active cart
    $entry = CartProduct::where('id_cart', '=', $cart->id)
    ->where('id_product', '=', $id);

    return $entry;
  }

  private function getAllCartEntries(){
    //Gets the active cart of the currently authenticated user
    $cart = $this->getCart();

    //Gets the products of the active cart of the user
    $entries = CartProduct::where('id_cart', '=', $cart->id)->get();

    return $entries;
  }

  public function show(){
    $user = User::find(Auth::id());
    $cartProducts = $this->getAllCartEntries();
    $cart = array();

    $total = 0;
    foreach($cartProducts as $entry){
      $product = Product::find($entry->id_product);
      array_push(
        $cart,
        [
          'product' => $product,
          'quantity' => $entry->quantity
        ]
      );

      $total += $product->price * $entry->quantity;
    }

    return view('pages.profile.cart', [
      'user' => $user,
      'cart' => $cart,
      'total' => $total,
      'breadcrumbs' => [route('profile') => $user->name],
      'current' => 'Cart'
    ]);
  }

  public function addEntry(Request $request, $product_id)
  { 
    //! If the user is not authenticated, he is redirected to the login page
    if(!Auth::check())
      return redirect(route('login'));

    $entry = new CartProduct();

    $entry->id_cart = $this->getCart()->id;
    $entry->id_product = (int)$product_id;
    $entry->quantity = 0;
    
    $entry->quantity++;
    $entry->save();

    return redirect()->back();
  }

  public function deleteEntry(Request $request, $product_id)
  {
    $entry = $this->getCartEntry($product_id);
    //dd($entry);
    $entry->delete();
    return redirect()->back();
  }

  public function incrementQuantity(Request $request, $product_id)
  {
    $entry = $this->getCartEntry($product_id);

    $entry->quantity++;
    $entry->save();
    
    return redirect()->back();
  }

  public function decrementQuantity(Request $request, $product_id)
  {
    $entry = $this->getCartEntry($product_id);

    $entry->quantity--;
    $entry->save();

    return redirect()->back();
  }

  public function empty()
  {
    $cart = $this->getAllCartEntries();
    
    foreach($cart as $entry){
      $entry->delete();
    }

    return redirect()->back();
  }
}
?>
