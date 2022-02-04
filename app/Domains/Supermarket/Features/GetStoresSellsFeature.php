<?php

namespace App\Domains\Supermarket\Features;

use App\Domains\Supermarket\Jobs\GetStoresSellsJob;
use Lucid\Units\Feature;

class GetStoresSellsFeature extends Feature
{
    public function handle()
    {
        $stores = $this->run(GetStoresSellsJob::class);
        foreach ($stores as $store){
            $store->sales = round($store->orders()->get()->sum('total'), 2);
        }
        $stores = collect($stores)->sortByDesc('sales')->values()->all();

        return response()->json(['data' => $stores]);
    }
}
