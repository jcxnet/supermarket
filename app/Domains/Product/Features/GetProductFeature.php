<?php

namespace App\Domains\Product\Features;

use App\Domains\Product\Jobs\GetProductJob;
use App\Domains\Product\Requests\GetProduct;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetProductFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(GetProduct $request)
    {
        $data = $request->validated();

        $product = $this->run(
            GetProductJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => $product]);
    }
}
