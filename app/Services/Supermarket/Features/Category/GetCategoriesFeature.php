<?php

namespace App\Services\Supermarket\Features\Category;

use App\Domains\Category\Jobs\GetCategoriesJob;
use Lucid\Units\Feature;

class GetCategoriesFeature extends Feature
{
    public function handle()
    {
        $categories = $this->run(GetCategoriesJob::class);

        return response()->json(['data' => $categories]);
    }
}
