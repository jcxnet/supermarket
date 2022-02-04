<?php

namespace App\Domains\Supermarket\Features;

use App\Domains\Supermarket\Jobs\GetProductsStoreJob;
use App\Domains\Supermarket\Requests\GetProductsStore;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetProductsStoreFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(GetProductsStore $request)
    {
        $data = $request->validated();

        $store = $this->run(
            GetProductsStoreJob::class,[
            'id' => $data['id']
        ]);

        $orders = $store->orders()->get();
        $products = [];
        foreach ($orders as $order) {
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
        $products = collect($products)->sortByDesc('quantity')->values();

        return response()->json(['data' => $products]);

    }
}
