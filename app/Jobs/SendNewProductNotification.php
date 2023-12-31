<?php

namespace App\Jobs;

use App\Mail\ProductCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendNewProductNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $product;
    
    /**
     * Create a new job instance.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::where('role','user')->get();

        foreach ($users as $user) {
            // Dispatch the ProductCreated mail
            Mail::to($user->email)->send(new ProductCreated($this->product));
        }
    }
}
