<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function home(){
        $productsList1 = array();
        $productsList2 = array();
        $products = Product::all();

        for($i = 0; $i < 4; $i++){
            $random = rand(0, count($products) - 1);
            
            array_push($productsList1, $products[$random]);
            array_push($productsList2, $products[$random]);
        }


        return view('pages.home', [
            'productsList1' => $productsList1,
            'productsList2' => $productsList2
        ]);
    }
}
