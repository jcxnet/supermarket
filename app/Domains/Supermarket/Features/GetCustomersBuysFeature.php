<?php

namespace App\Domains\Supermarket\Features;

use App\Domains\Supermarket\Jobs\GetCustomersBuysJob;
use Lucid\Units\Feature;

class GetCustomersBuysFeature extends Feature
{
    public function handle()
    {
        $customers = $this->run(GetCustomersBuysJob::class);
        foreach($customers as $customer){
            $customer->buys = round($customer->orders()->get()->sum('total'), 2);
        }
        $customers = collect($customers)->sortByDesc('buys')->values()->all();

        return response()->json(['data' => $customers]);
    }
}
