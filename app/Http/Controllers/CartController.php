<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{ 

  /**Show Cart
  *
  *
  * @return Response
  */
  public function list()
  {
      if (!Auth::check()) 
        return redirect('/login');

      $this->authorize('list', CartProduct::class);
      $cart = Auth::user()->cart()->orderBy('created_at')->get();

      return view('pages.cart', ['cart' => $cart]);
  }

  /**Adds product to cart.
  *
  *
  * @return Cart item
  */
  public function add(Request $request)
  {
      $cartitem = new CartProduct();
      $this->authorize('add', $cartitem);
      $cartitem->amount = $request->input('amount');
      $cartitem->user_id = Auth::user()->id;
      $cartitem->save();

      return $cartitem;
  }

  /**Removes a product from cart.
  *
  *
  * @return Removed cart item
  */
  public function delete(Request $request, $id)
  {
      $cartitem = CartProduct::find($id);

      $this->authorize('delete', $cartitem);
      $cartitem->delete();

      return $cartitem;
  }
}
?>
