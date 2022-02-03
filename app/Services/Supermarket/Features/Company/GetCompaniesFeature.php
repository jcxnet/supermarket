<?php

namespace App\Services\Supermarket\Features\Company;

use App\Domains\Company\Jobs\GetCompaniesJob;
use Lucid\Units\Feature;
use function response;

class GetCompaniesFeature extends Feature
{
    public function handle()
    {
        $companies = $this->run(GetCompaniesJob::class);

        return response()->json(['data' => $companies]);
    }
}
