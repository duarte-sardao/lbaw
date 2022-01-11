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

  public function show(){
    $customer = Customer::where('id_user', '=', Auth::id())->first();
    $temps = CustomerAddress::where('id_customer', '=', $customer->id)->get();
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

  public function add(Request $request){
    $address = new Address;
    $errors = array();

    $streetName = $request->input('streetName');
    $streetNumber = $request->input('streetNumber');
    $aptNumber = $request->input('aptNumber');
    $floor = $request->input('floor');
    $zipcodeNumber = $request->input('zipcodeNumber');
    $zipcodeLocation = $request->input('zipcodeLocation');

    if(!is_numeric($streetNumber)){
      array_push($errors, 'Street Number does not match the specified format.');
    }

    if(!is_numeric($floor) && !is_null($floor)){
      array_push($errors, 'Floor does not match the specified format.');
    }

    $regex = '/^[0-9]{4}-[0-9]{3}$/';
    if(!preg_match($regex, $zipcodeNumber)){
      array_push($errors, 'Zipcode does not match the specified format.');
    }

    if(count($errors) != 0){
      return view('pages.profile.user_profile', 
      [
        'user' => User::find(Auth::id()),
        'content' => 'partials.profile.address_form',
        'entries' => [],
        'breadcrumbs' => [
          route('profile') => Auth::user()->username,
          route('showAddresses') => 'Addresses'
        ],
        'current' => 'New',
        'errors' => $errors
      ]);
    }

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
    $customer = Customer::where('id_user', '=', Auth::id())->first(); 
    $customerAddress = new CustomerAddress;

    $customerAddress->id_customer = $customer->id;
    $customerAddress->id_address = $address->id;

    $customerAddress->save();

    return redirect(route('showAddresses'));
  }

  public function delete($address_id){
    $customer = Customer::where('id_user', '=', Auth::id())->first();
    $entry = CustomerAddress::where('id_customer', '=', $customer->id)
    ->where('id_address', '=', $address_id);

    $entry->delete();

    return redirect()->back();
  }
}

?>