<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{ 

  public function userManagementArea(){
    $admin = User::find(Auth::id());
    $users = User::all();   

    return view('pages.admin.user_management', [
      'users' => $users,
      'admin' => $admin,
      'breadcrumbs' => [route('profile') => $admin->name],
      'current' => null
    ]);
  }

  public function productManagementArea(){
    $admin = User::find(Auth::id());
    $products = Product::all();   

    return view('pages.admin.product_management', [
      'products' => $products,
      'admin' => $admin,
      'breadcrumbs' => [route('profile') => $admin->name],
      'current' => null
    ]);
  }
  
  public function orderManagementArea(){
    $admin = User::find(Auth::id());
    $orders = Purchase::all();

    return view('pages.admin.order_management', [
      'orders' => $orders,
      'admin' => $admin,
      'breadcrumbs' => [route('profile') => $admin->name],
      'current' => null
    ]);
  }
}
?>