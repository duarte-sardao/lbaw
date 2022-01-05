<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{ 
  /**
   * @method Displays the edit profile form
   * @param id Id of the User whose profile will be edited
   */
   
  public function showProfile()
  {
    $user = User::find(Auth::user()->id);
    //$this->authorize('show', $user);

    return view('pages.profile.user_profile', ['user' => $user]);
  }
  
  public function editProfile()
  {
    $user = User::find(Auth::user()->id);
    //$this->authorize('update', $user);

    return view('pages.profile.edit', ['user' => $user]);
  }

  /**
   * @method Processes the data inputed on the edit profile form to update the User's data
   * @param request Request data to be parsed
   * @param id Id of the user to update
   */
  public function updateProfile(Request $request, $id)
  {
    $user = User::find($id);

    $newUsername = $request->input('username');
    $newPassword = $request->input('password');
    $newEmail = $request->input('email');
    $newPhone = $request->input('phone');

    if(!is_null($newUsername)){
      $user->username = $newUsername;
    }

    if(!is_null($newPassword)){
      $user->password = $newPassword;
    }

    if(!is_null($newEmail)){
      $user->email = $newEmail;
    }

    if(!is_null($newPhone)){
      $user->phone = $newPhone;
    }

    $user->save(); 

    return redirect('/users');
  }

  /**
   * @method Deletes an user from the database
   * @param id Id of the user to delete
   */
  public function delete($id)
  {
    $user = User::find($id);
    //$this->authorize('delete', $user);
    $user->delete();
  }
  
}

?>