<?php

namespace App\Domains\Company\Features;

use App\Domains\Company\Jobs\GetCompaniesJob;
use Lucid\Units\Feature;

class GetCompaniesFeature extends Feature
{
    public function handle()
    {
        $companies = $this->run(GetCompaniesJob::class);
        foreach ($companies as $company){
            $company->contacts = $company->contacts()->orderBy('name')->get();
            $company->products = $company->products()->orderBy('name')->get();
        }

        return response()->json(['data' => $companies]);
    }
}
