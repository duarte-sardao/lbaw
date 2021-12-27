<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{ 
  /**
   * @method Displays the edit profile form
   * @param id Id of the Account whose profile will be edited
   */
  public function edit($id)
  {
    $account = Account::find($id);
    $this->authorize('update', $account);

    return view('pages.profile.edit_profile', ['account' => $account]);
  }

  /**
   * @method Processes the data inputed on the edit profile form to update the Account's data
   * @param id Id of the account to update
   */
  public function update(Request $request, $id)
  {
    try{
      $account = Account::find($id);

      $newUsername = $request->input('username');
      $newPassword = $request->input('password');
      $newEmail = $request->input('email');
      $newPhone = $request->input('phone');
      $newProfilePic = $request->input('profilePic');

      if(!is_null($newUsername)){
        $account->username = $newUsername;
      }

      if(!is_null($newPassword)){
        $account->password = $newPassword;
      }

      if(!is_null($newEmail)){
        $account->email = $newEmail;
      }

      if(!is_null($newPhone)){
        $account->phone = $newPhone;
      }

      if(!is_null($newProfilePic)){
        $account->profilePic = $newProfilePic;
      }

      $account->save();
    }
    
    catch(Exception $e){
      echo $e->getMessage();
    }
  }

  /**
   * @method Deletes an account from the database
   * @param id Id of the account to delete
   */
  public function delete($id)
  {
    $account = Account::find($id);
    $this->authorize('delete', $account);
    $account->delete();
  }
  
}

?>