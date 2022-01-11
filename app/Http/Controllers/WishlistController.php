<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{ 
  public function showWishlist(){
    $user = User::find(Auth::id());
    $customer = Customer::where('id_user', '=', Auth::id())->first();
    $wishlist = Wishlist::where('id_customer', '=', $customer->id)->get();

    $entries = array();

    foreach($wishlist as $product){
      array_push($entries, Product::find($product->id_product));
    }

    return view('pages.profile.user_profile', [
      'user' => $user,
      'entries' => $entries,
      'content' => 'partials.profile.user_wishlist',
      'breadcrumbs' => [route('profile') => $user->username],
      'current' => 'Wishlist'
    ]);
  }
  
  public function addEntry($product_id){
    if(!Auth::check())
      return redirect(route('login'));

    $customer = Customer::where('id_user', '=', Auth::id())->first();

    $entry = new Wishlist;

    $entry->id_customer = $customer->id;
    $entry->id_product = $product_id;

    $entry->save();

    return redirect()->back();
  }

  public function deleteEntry($product_id){
    $customer = Customer::where('id_user', '=', Auth::id())->first();
    $entry = Wishlist::where('id_customer', '=', $customer->id)
    ->where('id_product','=', $product_id);

    $entry->delete();

    return redirect()->back();
  }

  public function empty(){
    $customer = Customer::where('id_user', '=', Auth::id())->first();
    $entries = Wishlist::where('id_customer', '=', $customer->id)->get();

    foreach($entries as $entry){
      $entry->delete();
    }

    return redirect()->back();
  }
}
?>