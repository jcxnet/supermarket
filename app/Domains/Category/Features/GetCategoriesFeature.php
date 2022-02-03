<?php

namespace App\Domains\Category\Features;

use App\Domains\Category\Jobs\GetCategoriesJob;
use Lucid\Units\Feature;
use function response;

class GetCategoriesFeature extends Feature
{
    public function handle()
    {
        $categories = $this->run(GetCategoriesJob::class);

        return response()->json(['data' => $categories]);
    }
}
