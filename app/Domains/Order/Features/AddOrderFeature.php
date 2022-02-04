<?php

namespace App\Domains\Order\Features;

use App\Domains\Order\Jobs\SaveOrderJob;
use App\Domains\Order\Requests\AddOrder;
use Lucid\Units\Feature;
use Ramsey\Uuid\Uuid;

class AddOrderFeature extends Feature
{
    public function handle(AddOrder $request)
    {
        $data = $request->validated();

        $order = $this->run(
            SaveOrderJob::class, [
            'id' => Uuid::uuid4(),
            'total' => $data['total'],
        ]);

        return response()->json(['data' => $order]);
    }
}
