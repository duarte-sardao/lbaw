<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\CartProduct;
use App\Models\Customer;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\User;

class UserController extends Controller
{ 
  /**
   * @method Displays the edit profile form
   * @param id Id of the User whose profile will be edited
   */
   
  public function showProfile()
  {
    $user = User::find(Auth::id());
    $this->authorize('show', $user);

    return view('pages.profile.user_profile', [
      'user' => $user,
      'content' => 'partials.profile.user_data',
      'entries' => null,
      'breadcrumbs' => [],
      'current' => $user->username
    ]);
  }

  /**
   * @method Processes the data inputed on the edit profile form to update the User's data
   * @param request Request data to be parsed
   * @param id Id of the user to update
   */
  public function updateProfile(Request $request, $id)
  {
    $user = User::find($id);
    $this->authorize('update', $user);

    if(!is_null($request->input('username'))){
      $user->username = $request->input('username');
    }

    if(!is_null($request->input('password'))){
      $user->password = bcrypt($request->input('password'));
    }

    if(!is_null($request->input('email'))){
      $user->email = $request->input('email');
    }

    if(!is_null($request->input('phone'))){
      $user->phone = $request->input('phone');
    }

    $user->save(); 

    return redirect()->back();
  }

  /**
   * @method Deletes an user from the database
   * @param id Id of the user to delete
   */
  public function delete()
  {
    $user = User::find(Auth::id());
    $this->authorize('delete', $user);
    $user->delete();

    return redirect('/');
  }
  
  public function showAddresses(){
    
  }

  public function showOrders(){
    $user = Customer::find(Auth::id());
    $orders = $user->Purchases;
    $entries = array();
    $products = array();
    
    //Gets every order of the user
    foreach($orders as $order){
      //Finds all the entries of the cart of the current order
      $cartEntries = CartProduct::where('id_cart', '=', $order->id_cart)->get();
      
      $total = 0;
      $products = array();

      //Finds the prices and quantities of all products in the cart
      foreach($cartEntries as $entry){
        $product = Product::find($entry->id_product);
        $total += $entry->quantity * $product->price;
        array_push($products, $product);
      }

      array_push($entries,
      [
        'order' => $order,
        'products' => $products,
        'address' => Address::find($order->id_address),
        'total' => $total
      ]);
    }

    return view('pages.profile.user_profile', [
      'user' => $user,
      'content' => 'partials.profile.user_orders',
      'entries' => $entries,
      'breadcrumbs' => [],
      'current' => $user->name
    ]);
  }

  
  public function showNotifications(){
    
  }
}

?>