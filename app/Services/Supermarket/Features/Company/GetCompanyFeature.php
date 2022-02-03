<?php

namespace App\Services\Supermarket\Features\Company;

use App\Domains\Company\Jobs\GetCompanyJob;
use App\Domains\Supermarket\Requests\Company\GetCompany;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetCompanyFeature extends Feature
{

    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(GetCompany $request)
    {
        $data = $request->validated();

        $category = $this->run(
            GetCompanyJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => $category]);
    }
}