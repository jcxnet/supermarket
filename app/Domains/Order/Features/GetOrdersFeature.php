<?php

namespace App\Domains\Order\Features;

use App\Domains\Order\Jobs\GetOrdersJob;
use Lucid\Units\Feature;

class GetOrdersFeature extends Feature
{
    public function handle()
    {
        $orders = $this->run(GetOrdersJob::class);

        return response()->json(['data' => $orders]);
    }
}
