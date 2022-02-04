<?php

namespace App\Domains\Store\Features;

use App\Domains\Store\Jobs\GetStoresJob;
use Lucid\Units\Feature;

class GetStoresFeature extends Feature
{
    public function handle()
    {
        $stores = $this->run(GetStoresJob::class);
        foreach ($stores as $store){
            $store->products = $store->products()->orderBy('name')->get();
            $orders = $store->orders()->orderByDesc('created_at')->get();
            foreach ($orders as $order){
                $order->customer = $order->customer()->get();
            }
            $store->orders = $orders;
        }

        return response()->json(['data' => $stores]);
    }
}
