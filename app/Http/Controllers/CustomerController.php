<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{ 
  public function showAddresses(){
    
  }

  public function showOrders(){
    $user = Customer::find(Auth::id());
    $orders = $user->Purchases;
    $entries = array();
    
    foreach($orders as $order){
      array_push($entries,
      [
        'order' => $order,
        'address' => Address::find($order->id_address)
      ]);
    }

    return view('pages.profile.user_profile', [
      'user' => $user,
      'content' => 'partials.profile.user_orders',
      'entries' => $entries
    ]);
  }
}
?>