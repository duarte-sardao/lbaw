<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{ 
  /**
   * @method Displays the register form
   */
  public function create()
  {
    return view('pages.register');
  }

  /**
   * @method Processes the data inputed on the creation form to create a new instance of the Customer Model
   * @param request HTTP request with the input data
   * @return customer The new customer
   */
  public function store(Request $request)
  {
    $customer = new Customer();
    $customer->id = $request->input('id');
    $customer->cart_id = $request->input('id');
    $customer->save();

    return $customer;
  }
  
  /**
   * @method Displays the customer's profile
   * @param id Id of the customer whose profile will be displayed
   */
  public function show($id)
  { 
    $customer->Customer::find($id);
    $this->authorize('show', $customer);

    return view('pages.user_profile', ['customer' => $customer]);
  }

  /**
   * @method Displays the edit profile form
   * @param id Id of the customer whose profile will be edited
   */
  public function edit($id)
  {
    $customer->Customer::find($id);
    $this->authorize('update', $customer);

    return view('pages.edit_profile', ['customer'=> $customer]);
  }

  /**
   * @method Processes the data inputed on the edit profile form to update the customer's data
   * @param id Id of the user to delete
   */
  public function update(Request $request, $id)
  {
    $account = Account::find($id);
    return $account->update($request, $id);
  }

  /**
   * @method Deletes a user from the database, by deleting its account
   * @param id Id of the user to delete
   * @return ---
   */
  public function delete($id)
  {
    $account = Account::find($id);
    $this->authorize('delete', $account);
    return $account->destroy($request, $id);
  }
}

>