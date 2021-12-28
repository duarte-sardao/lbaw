<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class StaticController extends Controller
{ 
  public function index(){
    return view(pages.index);
  }

  public function about(){
    return view(pages.about);
  }

  public function faq(){
    return view(pages.faq);
  }

  public function contact(){
    return view(pages.contact);
  }
}

?>
