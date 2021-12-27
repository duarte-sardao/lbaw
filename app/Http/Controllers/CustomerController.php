<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{ 
  /**
   * @method Displays the customer's profile
   * @param id Id of the customer whose profile will be displayed
   */
  public function show($id)
  { 
    $customer = Customer::find($id);
    $this->authorize('show', $customer);

    return view('pages.profile.customer_profile', ['customer' => $customer]);
  }

  /**
   * @method Displays the edit profile form
   * @param id Id of the customer whose profile will be edited
   */
  public function edit($id)
  {
    return Account::find($id)->edit($id);
  }

  /**
   * @method Processes the data inputed on the edit profile form to update the customer's data
   * @param id Id of the user to update
   */
  public function update(Request $request, $id)
  {
    return Account::find($id)->update($request, $id);
  }

  /**
   * @method Deletes a user from the database, by deleting its account
   * @param id Id of the user to delete
   */
  public function delete($id)
  {
    return Account::find($id)->delete($id);
  }
}
?>