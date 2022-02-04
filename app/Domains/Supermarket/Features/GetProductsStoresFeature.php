<?php

namespace App\Domains\Supermarket\Features;

use App\Domains\Supermarket\Jobs\GetProductsStoresJob;
use Lucid\Units\Feature;

class GetProductsStoresFeature extends Feature
{
    public function handle()
    {
        $stores = $this->run(GetProductsStoresJob::class);
        foreach ($stores as $store){
            $store->products = $this->getProductSales($store);
        }

        return response()->json(['data' => $stores]);
    }

    private function getProductSales($store): array
    {
        $products = [];
        $storeOrders = $store->orders()->get();
        foreach ($storeOrders as $order) {
            $orderProducts = $order->products()->get();
            foreach ($orderProducts as $orderProduct) {
                $product = $orderProduct->product()->get()->first();
                if (isset($products[$product->id])) {
                    $products[$product->id]['quantity'] += $orderProduct->quantity;
                } else {
                    $products[$product->id]['id'] = $product->id;
                    $products[$product->id]['name'] = $product->name;
                    $products[$product->id]['quantity'] = $orderProduct->quantity;
                }
            }
        }
        return collect($products)->sortByDesc('quantity')->values()->all();
    }
}
