<?php

namespace App\Domains\Customer\Features;

use App\Domains\Customer\Jobs\SaveCustomerJob;
use App\Domains\Customer\Requests\AddCustomer;
use Lucid\Units\Feature;
use Ramsey\Uuid\Uuid;

class AddCustomerFeature extends Feature
{
    public function handle(AddCustomer $request)
    {
        $data = $request->validated();

        $customer = $this->run(
            SaveCustomerJob::class, [
            'id' => Uuid::uuid4(),
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return response()->json(['data' => $customer]);
    }
}
