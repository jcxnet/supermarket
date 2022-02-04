<?php

namespace App\Domains\Product\Features;

use App\Domains\Product\Jobs\SaveProductJob;
use App\Domains\Product\Requests\AddProduct;
use Lucid\Units\Feature;
use Ramsey\Uuid\Uuid;

class AddProductFeature extends Feature
{
    public function handle(AddProduct $request)
    {
        $data = $request->validated();

        $product = $this->run(
            SaveProductJob::class, [
            'id' => Uuid::uuid4(),
            'name' => $data['name'],
            'slug' => $data['slug'],
            'price' => $data['price'],
            'description' => $data['description'] ?? null,
        ]);

        return response()->json(['data' => $product]);
    }
}
