<?php

namespace App\Domains\Order\Features;

use App\Domains\Order\Jobs\UpdateOrderJob;
use App\Domains\Order\Requests\UpdateOrder;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class UpdateOrderFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(UpdateOrder $request)
    {
        $data = $request->validated();
        $order = $this->run(
            UpdateOrderJob::class, [
            'id' => $data['id'],
            'total' => $data['total'],
        ]);

        return response()->json(['data' => $order])->send();
    }
}
