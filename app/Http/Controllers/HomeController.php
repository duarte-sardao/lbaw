<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function home(){
        $itemsList1 = array();
        $itemsList2 = array();
        /* $products = Product::all();
        
        for($i = 0; $i < 12; $i++){
            $random = rand(0, count($products));
            array_push($itemsList1, $products[$random]);
            array_push($itemsList2, $products[$random]);
        } */

        return view('pages.home', [
            'itemsList1' => $itemsList1,
            'itemsList2' => $itemsList2
        ]);
    }
}
