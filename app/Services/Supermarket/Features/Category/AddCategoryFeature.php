<?php

namespace App\Services\Supermarket\Features\Category;

use App\Domains\Category\Jobs\SaveCategoryJob;
use App\Domains\Category\Requests\AddCategory;
use Illuminate\Support\Str;
use Lucid\Units\Feature;
use Ramsey\Uuid\Uuid;
use function response;

class AddCategoryFeature extends Feature
{
    public function handle(AddCategory $request)
    {
        $data = $request->validated();

        $category = $this->run(
            SaveCategoryJob::class, [
                'id' => Uuid::uuid4(),
                'name' => $data['name'],
                'slug' => Str::of($data['name'])->slug(),
                'description' => $data['description'] ?? null
        ]);

        return response()->json(['data' => $category]);
    }
}
