<?php

namespace App\Domains\Product\Features;

use App\Domains\Product\Jobs\DeleteProductJob;
use App\Domains\Product\Requests\DeleteProduct;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class DeleteProductFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(DeleteProduct $request)
    {
        $data = $request->validated();

        $deleted = $this->run(
            DeleteProductJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => ['id' => $this->id], 'deleted' => $deleted])->send();
    }
}
