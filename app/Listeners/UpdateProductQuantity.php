<?php

namespace App\Listeners;

use App\Events\ProductPurchased;

class UpdateProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductPurchased $event): void
    {
        $product = $event->product;
        $quantity = $event->quantity;

        $product->decrement('quantity', $quantity);
        // dd($quantity);
    }
}
