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
            array_push($productsList1, $products[rand(0, count($products) - 1)]);
            array_push($productsList2, $products[rand(0, count($products) - 1)]);
        }

        return view('pages.home', [
            'productsList1' => $productsList1,
            'productsList2' => $productsList2,
            'breadcrumbs' => [],
            'current' => null
        ]);
    }
}
