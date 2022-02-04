<?php

namespace App\Domains\Customer\Features;

use App\Domains\Customer\Jobs\GetCustomerJob;
use App\Domains\Customer\Requests\GetCustomer;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetCustomerFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(GetCustomer $request)
    {
        $data = $request->validated();

        $contact = $this->run(
            GetCustomerJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => $contact]);
    }
}
