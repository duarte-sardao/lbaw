<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{ 
  public function showWishlist(){
    /* $user = User::find(Auth::user()->id);
    $entries = 
      Wishlist::select('id_product', 'id_product as id')
      ->where('id_cart', '=', Auth::user()->id);

    $wishlist = array();
    
    $this->authorize('show', $user);

    return view('pages.profile.user_profile', [
      'user' => $user,
      'entries' => $wishlist,
      'content' => 'partials.profile.user_wishlist',
      'breadcrumbs' => [route('profile') => $user->name],
      'current' => 'Wishlist'
    ]); */
  }
  
  public function addEntry(){
    if(!Auth::check())
      return redirect(route('login'));
  }

  public function deleteEntry(){

  }

  public function empty(){

  }
}
?>