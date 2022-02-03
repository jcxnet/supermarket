<?php

namespace App\Services\Supermarket\Features\Category;

use App\Domains\Category\Jobs\UpdateCategoryJob;
use App\Domains\Supermarket\Requests\Category\UpdateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Lucid\Units\Feature;

class UpdateCategoryFeature extends Feature
{

    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(UpdateCategory $request)
    {
        $data = $request->validated();

        $category = $this->run(
            UpdateCategoryJob::class, [
                'id' => $data['id'],
                'name' => $data['name'],
                'slug' => Str::of($data['name'])->slug(),
                'description' => $data['description'] ?? null
        ]);

        return response()->json(['data' => $category])->send();
    }
}
