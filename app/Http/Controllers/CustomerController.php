<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{ 
   //Displays creation form
  public function create()
  {
    return view('pages.register');
  }

  //Stores a new Customer created in create()
  public function store(Request $request)
  {
    $Customer = new Customer();
    $Customer->id = $request->input('id');
    $Customer->cart_id = $request->input('id');
    $Customer->save();

    return $Customer;

  }
  
  //Displays the Customer's profile
  public function show($id)
  { 
    $customer->Customer::find($id);
    $this->authorize('show', $customer);

    return view('pages.user_profile', ['customer' => $customer]);
  }

  //Displays edit form
  public function edit($id)
  {
    $customer->Customer::find($id);
    $this->authorize('update', $customer);

    return view('pages.edit_profile', ['customer'=> $customer]);
  }

  //Commits the changes made in edit
  public function update(Request $request, $id)
  {
    
  }

  //Deletes the Customer from the database
  public function destroy($id)
  {
    
  }
}

>