<?php

namespace App\Domains\Store\Features;

use App\Domains\Store\Jobs\GetStoreJob;
use App\Domains\Store\Requests\GetStore;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetStoreFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(GetStore $request)
    {
        $data = $request->validated();

        $store = $this->run(
            GetStoreJob::class,[
            'id' => $data['id']
        ]);

        $store->products = $store->products()->orderBy('name')->get();

        $orders = $store->orders()->orderByDesc('created_at')->get();
        foreach ($orders as $order){
            $order->customer = $order->customer()->get();
        }
        $store->orders = $orders;

        return response()->json(['data' => $store]);
    }
}
