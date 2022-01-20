<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use App\Models\Card;
use App\Models\Paypal;
use App\Models\Transfer;
use App\Models\PaymentMethod;
use App\Models\Purchase;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{ 
  private function getCustomer(){
    return Customer::where('id_user', '=', Auth::id())->first();
  }

  private function getCart(){
    $entry = Customer::select('id')
    ->where('id_user', '=', Auth::id())
    ->first();

    return Cart::where('id_customer', '=', $entry->id)
    ->where('isactive', '=', true)
    ->first();
  }

  private function getAllCustomerAddresses(){
    $customer = $this->getCustomer();
    return CustomerAddress::where('id_customer', '=', $customer->id)->get();
  }

  public function checkout(){
    $customerAddresses = $this->getAllCustomerAddresses();
    $entries = array();

    foreach($customerAddresses as $customerAddress){
      array_push(
        $entries,
        Address::find($customerAddress->id_address)
      );
    }

    return view('partials.cart.checkout', 
    [
      //'user' => User::find(Auth::id()),
      //'content' => 'partials.profile.user_addresses',
      'entries' => $entries,
      'breadcrumbs' => [route('checkout') => Auth::user()->username],
      'current' => 'Checkout'
    ]);
  }

  public function add(Request $request){
    $errors = array();

    $ptype = $request->input('paymentType');
    $payment = new PaymentMethod;
    $purchase = new Purchase;
    $payment->type = $ptype;
    $payment->save();
    switch ($ptype) {
      case "Paypal":
        $ppEmail = $request->input('paypalEmail');
        $paypal = new Paypal;
        $paypal->email = $ppEmail;
        $paypal->id_paymentmethod = $payment->id;
        $paypal->save();
        break;
      case "Card":
        $cname = $request->input('cardName');
        $cnumber = $request->input('cardNumber');
        $cexpdate = $request->input('cardExpiration');
        $ccvv = $request->input('cardCVV');
        $card = new Card;
        $card->name = $cname;
        $card->number = $cnumber;
        $card->expdate = $cexpdate;
        $card->cvv = $cvv;
        $card->id_paymentmethod = $payment->id;
        $card->save();
        break;
      case "Transfer":
        $tEnt = $request->input('transferEntity');
        $tRef = $request->input('transferReference');
        $tVal = $request->input('transferValidFor');
        $transfer = new Transfer;
        $transfer->entity = $tEnt;
        $transfer->reference = $tRef;
        $transfer->validfor = $tVal;
        $transfer->id_paymentmethod = $payment->id;
        $transfer->save();
        break;
    }

    $address = $request->input('addressID');
    $cart = getCart();


    return redirect('home');
  }

  /*public function show(){
    $user = $this->getCustomer();
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
      'current' => $user->username
    ]);
  }*/
}
?>
