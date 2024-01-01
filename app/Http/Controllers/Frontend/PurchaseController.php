<?php

namespace App\Http\Controllers\Frontend;

use App\Events\ProductPurchased;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function purchaseProduct(Request $request, $productId)
    {
        $quantity = $request->input('quantity');
        $product = Product::findOrFail($productId);
        if ($product->quantity >= $quantity) {
            $product->decrement('quantity', $quantity);
            $user = auth()->user();

            $order = Order::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
            event(new ProductPurchased($product, $quantity));

            // dd('event fired');
            return redirect()->back();
        } else {
            return response()->json(['message' => 'Low quantity']);
        }
    }
}
