<?php

namespace App\Services\Supermarket\Features\Category;

use App\Domains\Category\Jobs\DeleteCategoryJob;
use App\Domains\Supermarket\Requests\Category\DeleteCategory;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class DeleteCategoryFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(DeleteCategory $request)
    {
        $data = $request->validated();

        $deleted = $this->run(
            DeleteCategoryJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => ['id' => $this->id], 'deleted' => $deleted])->send();
    }
}
