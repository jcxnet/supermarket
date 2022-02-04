<?php

namespace App\Domains\Order\Features;

use App\Domains\Order\Jobs\GetOrderJob;
use App\Domains\Order\Requests\GetOrder;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetOrderFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(GetOrder $request)
    {
        $data = $request->validated();

        $order = $this->run(
            GetOrderJob::class,[
            'id' => $data['id']
        ]);

        $order->customer = $order->customer()->get();
        $order->store = $order->store()->get();
        $products = $order->products()->get();
        foreach ($products as $product){
            $product->product = $product->product()->get();
        }
        $order->products = $products;

        return response()->json(['data' => $order]);
    }
}
