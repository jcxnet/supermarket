<?php

namespace App\Domains\Company\Features;

use App\Domains\Company\Jobs\DeleteCompanyJob;
use App\Domains\Company\Requests\DeleteCompany;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class DeleteCompanyFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(DeleteCompany $request)
    {
        $data = $request->validated();

        $deleted = $this->run(
            DeleteCompanyJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => ['id' => $this->id], 'deleted' => $deleted])->send();
    }
}
