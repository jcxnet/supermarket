<?php

namespace App\Domains\Supermarket\Features;

use App\Domains\Supermarket\Jobs\GetCompanyProductsJob;
use App\Domains\Supermarket\Requests\GetCompanyProducts;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetCompanyProductsFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(GetCompanyProducts $request)
    {
        $data = $request->validated();

        $company = $this->run(
            GetCompanyProductsJob::class,[
            'id' => $data['id']
        ]);
        $products = $company->products()->orderBy('name')->get();

        return response()->json(['data' => $products]);
    }
}
