<?php

namespace App\Domains\Customer\Features;

use App\Domains\Customer\Jobs\GetCustomersJob;
use Lucid\Units\Feature;

class GetCustomersFeature extends Feature
{
    public function handle()
    {
        $customers = $this->run(GetCustomersJob::class);

        return response()->json(['data' => $customers]);
    }
}
