<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::where('status', 1)->get();

        return view('frontend.home', compact('products'));
    }

    public function details($id)
    {
        $product = Product::find($id);

        return view('frontend.product-details', compact('product'));
    }
}
