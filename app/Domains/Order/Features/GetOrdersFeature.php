<?php

namespace App\Domains\Order\Features;

use App\Domains\Order\Jobs\GetOrdersJob;
use Lucid\Units\Feature;

class GetOrdersFeature extends Feature
{
    public function handle()
    {
        $orders = $this->run(GetOrdersJob::class);
        foreach ($orders as $order){
            $order->customer = $order->customer()->get();
            $order->store = $order->store()->get();
            $products = $order->products()->get();
            foreach ($products as $product){
                $product->product = $product->product()->get();
            }
            $order->products = $products;
        }

        return response()->json(['data' => $orders]);
    }
}
