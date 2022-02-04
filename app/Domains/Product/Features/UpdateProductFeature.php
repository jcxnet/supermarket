<?php

namespace App\Domains\Product\Features;

use App\Domains\Product\Jobs\UpdateProductJob;
use App\Domains\Product\Requests\UpdateProduct;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class UpdateProductFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(UpdateProduct $request)
    {
        $data = $request->validated();
        $contact = $this->run(
            UpdateProductJob::class, [
            'id' => $data['id'],
            'name' => $data['name'],
            'slug' => $data['slug'],
            'price' => $data['price'],
            'description' => $data['position'] ?? null,
        ]);

        return response()->json(['data' => $contact])->send();
    }
}
