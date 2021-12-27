<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{ 
  /**
   * @method Displays an admin's profile
   * @param id Id of the admin whose profile will be displayed
   */
  public function show($id)
  { 
    $admin = Admin::find($id);
    $this->authorize('show', $admin);

    return view('pages.profile.admin_profile', ['admin' => $admin]);
  }

  public function userManagementArea($id){
    $admin = Account::find($id);
    $accounts = Account::all();   

    return view('pages.admin.user_management', [
      'accounts' => $accounts,
      'admin' => $admin
    ]);
  }

}
?>