<?php

namespace App\Domains\Store\Features;

use App\Domains\Store\Jobs\GetStoresJob;
use Lucid\Units\Feature;

class GetStoresFeature extends Feature
{
    public function handle()
    {
        $stores = $this->run(GetStoresJob::class);

        return response()->json(['data' => $stores]);
    }
}
