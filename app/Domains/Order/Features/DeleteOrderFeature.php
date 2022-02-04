<?php

namespace App\Domains\Order\Features;

use App\Domains\Order\Jobs\DeleteOrderJob;
use App\Domains\Order\Requests\DeleteOrder;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class DeleteOrderFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(DeleteOrder $request)
    {
        $data = $request->validated();

        $deleted = $this->run(
            DeleteOrderJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => ['id' => $this->id], 'deleted' => $deleted])->send();
    }
}
