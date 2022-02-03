<?php

namespace App\Services\Supermarket\Features\Category;

use App\Domains\Category\Jobs\GetCategoryJob;
use App\Domains\Category\Requests\GetCategory;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetCategoryFeature extends Feature
{

    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(GetCategory $request)
    {
        $data = $request->validated();

        $category = $this->run(
            GetCategoryJob::class,[
                'id' => $data['id']
            ]);

        return response()->json(['data' => $category]);
    }
}
