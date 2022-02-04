<?php

namespace App\Domains\Product\Features;

use App\Domains\Product\Jobs\GetProductsJob;
use Lucid\Units\Feature;

class GetProductsFeature extends Feature
{
    public function handle()
    {
        $products = $this->run(GetProductsJob::class);
        foreach ($products as $product){
            $product->categories = $product->categories()->orderBy('name')->get();
            $product->companies = $product->companies()->orderBy('name')->get();
            $product->stores = $product->stores()->orderBy('name')->get();
            $product->orders = $product->orders()->get();
        }

        return response()->json(['data' => $products]);
    }
}
