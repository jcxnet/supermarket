<?php

namespace App\Domains\Supermarket\Features;

use App\Domains\Supermarket\Jobs\GetStoreOrdersJob;
use App\Domains\Supermarket\Requests\GetStoreOrders;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetStoreOrdersFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(GetStoreOrders $request)
    {
        $data = $request->validated();

        $store = $this->run(
            GetStoreOrdersJob::class,[
            'id' => $data['id']
        ]);

        $orders = $store->orders()->orderByDesc('created_at')->get();
        foreach ($orders as $order){
            $order->customer = $order->customer()->get();
        }

        return response()->json(['data' => $orders]);
    }
}
