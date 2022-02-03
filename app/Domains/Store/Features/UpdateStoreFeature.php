<?php

namespace App\Domains\Store\Features;

use App\Domains\Store\Jobs\UpdateStoreJob;
use App\Domains\Store\Requests\UpdateStore;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class UpdateStoreFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(UpdateStore $request)
    {
        $data = $request->validated();
        $store = $this->run(
            UpdateStoreJob::class, [
            'id' => $data['id'],
            'name' => $data['name'],
            'address' => $data['address'] ?? null,
            'url' => $data['url'] ?? null,
        ]);

        return response()->json(['data' => $store])->send();
    }
}
