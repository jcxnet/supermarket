<?php

namespace App\Domains\Store\Features;

use App\Domains\Store\Jobs\SaveStoreJob;
use App\Domains\Store\Requests\AddStore;
use Lucid\Units\Feature;
use Ramsey\Uuid\Uuid;

class AddStoreFeature extends Feature
{
    public function handle(AddStore $request)
    {
        $data = $request->validated();

        $store = $this->run(
            SaveStoreJob::class, [
            'id' => Uuid::uuid4(),
            'name' => $data['name'],
            'address' => $data['address'] ?? null,
            'url' => $data['url'] ?? null,
        ]);

        return response()->json(['data' => $store]);
    }
}
