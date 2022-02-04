<?php

namespace App\Domains\Product\Features;

use App\Domains\Product\Jobs\GetProductsJob;
use Lucid\Units\Feature;

class GetProductsFeature extends Feature
{
    public function handle()
    {
        $products = $this->run(GetProductsJob::class);

        return response()->json(['data' => $products]);
    }
}
