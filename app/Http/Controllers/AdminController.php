<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{ 

  public function userManagementArea($id){
    $admin = User::find($id);
    $accounts = User::all();   

    return view('pages.admin.user_management', [
      'accounts' => $accounts,
      'admin' => $admin,
      'breadcrumbs' => [route('profile') => $admin->name],
      'current' => null
    ]);
  }

}
?>