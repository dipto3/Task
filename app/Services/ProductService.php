<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductService
{
    public function create()
    {

        $categories = Category::where('status', 1)->get();

        return compact('categories');
    }

    public function store($request)
    {
        // dd($request->all());
        $input = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ];
        $product = Product::create($input);
        $product->slug = Str::slug($product->name.'-'.$product->id);
        $product->save();

        return $product;
    }

    public function index($request)
    {

        $products = Product::orderBy('id', 'DESC')->paginate(5);

        return compact('products');

    }

    public function change_status($request)
    {
        Product::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
    }

    public function edit($id)
    {
        $categories = Category::where('status', 1)->get();
        $product = Product::find($id);

        return compact('product', 'categories');
    }

    public function update($request, $id)
    {

        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
    }

    public function remove($id)
    {
        $product = Product::where('id', $id)->delete();
    }
}
