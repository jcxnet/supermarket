<?php

namespace App\Domains\Company\Features;

use App\Domains\Company\Jobs\GetCompaniesJob;
use Lucid\Units\Feature;

class GetCompaniesFeature extends Feature
{
    public function handle()
    {
        $companies = $this->run(GetCompaniesJob::class);

        return response()->json(['data' => $companies]);
    }
}
