<?php

namespace App\Domains\Customer\Features;

use App\Domains\Customer\Jobs\GetCustomersJob;
use Lucid\Units\Feature;

class GetCustomersFeature extends Feature
{
    public function handle()
    {
        $customers = $this->run(GetCustomersJob::class);
        foreach($customers as $customer){
            $orders = $customer->orders()->orderByDesc('created_at')->get();
            foreach ($orders as $order){
                $order->store = $order->store()->get();
            }

            $customer->orders = $orders;
        }

        return response()->json(['data' => $customers]);
    }
}
