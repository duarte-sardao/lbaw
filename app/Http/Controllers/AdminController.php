<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{ 

  public function userManagementArea($id){
    $admin = User::find($id);
    $users = User::all();   

    return view('pages.admin.user_management', [
      'users' => $users,
      'admin' => $admin,
      'breadcrumbs' => [route('profile') => $admin->name],
      'current' => null
    ]);
  }

}
?>