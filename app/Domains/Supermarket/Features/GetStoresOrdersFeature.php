<?php

namespace App\Domains\Supermarket\Features;

use App\Domains\Supermarket\Jobs\GetStoresOrdersJob;
use Lucid\Units\Feature;

class GetStoresOrdersFeature extends Feature
{
    public function handle()
    {
        $stores = $this->run(GetStoresOrdersJob::class);
        foreach ($stores as $store){
            $orders = $store->orders()->orderByDesc('created_at')->get();
            foreach ($orders as $order){
                $order->customer = $order->customer()->get();
            }
            $store->orders = $orders;
        }

        return response()->json(['data' => $stores]);
    }
}
