<?php

namespace App\Domains\Company\Features;

use App\Domains\Company\Jobs\SaveCompanyJob;
use App\Domains\Company\Requests\AddCompany;
use Illuminate\Support\Str;
use Lucid\Units\Feature;
use Ramsey\Uuid\Uuid;

class AddCompanyFeature extends Feature
{
    public function handle(AddCompany $request)
    {
        $data = $request->validated();

        $category = $this->run(
            SaveCompanyJob::class, [
            'id' => Uuid::uuid4(),
            'name' => $data['name'],
            'cif' => Str::upper($data['cif']),
        ]);

        return response()->json(['data' => $category]);
    }
}
