<?php

namespace App\Domains\Company\Features;

use App\Domains\Company\Jobs\GetCompanyJob;
use App\Domains\Company\Requests\GetCompany;
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
