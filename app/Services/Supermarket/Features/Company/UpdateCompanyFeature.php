<?php

namespace App\Services\Supermarket\Features\Company;

use App\Domains\Company\Jobs\UpdateCompanyJob;
use App\Domains\Company\Requests\UpdateCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Lucid\Units\Feature;

class UpdateCompanyFeature extends Feature
{

    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(UpdateCompany $request)
    {
        $data = $request->validated();
        $company = $this->run(
            UpdateCompanyJob::class, [
            'id' => $data['id'],
            'name' => $data['name'],
            'cif' => Str::upper($data['cif']),
        ]);

        return response()->json(['data' => $company])->send();
    }
}
