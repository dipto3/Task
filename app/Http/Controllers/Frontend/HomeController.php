<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    // Frontpage without login
    public function frontend()
    {
        $products = Product::where('status', 1)->get();

        return view('welcome', compact('products'));
    }

    //Frontpage with login
    public function home()
    {
        $products = Product::where('status', 1)->get();

        return view('frontend.home', compact('products'));
    }

    //Product details page
    public function details($id)
    {
        $product = Product::find($id);

        return view('frontend.product-details', compact('product'));
    }
}
