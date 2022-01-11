<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\CartProduct;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddressController extends Controller
{ 
  public function showAddressForm(){
    return view('pages.profile.user_profile', 
    [
      'user' => User::find(Auth::id()),
      'content' => 'partials.profile.address_form',
      'entries' => [],
      'breadcrumbs' => [
        route('profile') => Auth::user()->username,
        route('showAddresses') => 'Addresses'
      ],
      'current' => 'New'
    ]);
  }

  public function showAddresses(){
    $temps = CustomerAddress::where('id_customer', '=', Auth::id())->get();
    $entries = array();

    foreach($temps as $temp){
      array_push(
        $entries,
        Address::find($temp->id_address)
      );
    }

    return view('pages.profile.user_profile', 
    [
      'user' => User::find(Auth::id()),
      'content' => 'partials.profile.user_addresses',
      'entries' => $entries,
      'breadcrumbs' => [route('profile') => Auth::user()->username],
      'current' => 'Addresses'
    ]);
  }

  public function addEntry(Request $request){
    $address = new Address;

    $address->streetname = $request->input('streetName');
    $address->streetnumber = $request->input('streetNumber');
    $address->aptnumber = $request->input('aptNumber');
    $address->floor = $request->input('floor');
    $address->zipcode = 
      $request->input('zipcodeNumber').
      ' '.
      $request->input('zipcodeLocation');

    $address->save();

    //Insert on intermediate table
    $customerAddress = new CustomerAddress;

    $customerAddress->id_customer = Auth::id();
    $customerAddress->id_address = $address->id;

    $customerAddress->save();

    return redirect(route('showAddresses'));
  }

}

?>