<?php

namespace App\Domains\Customer\Features;

use App\Domains\Customer\Jobs\UpdateCustomerJob;
use App\Domains\Customer\Requests\UpdateCustomer;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class UpdateCustomerFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(UpdateCustomer $request)
    {
        $data = $request->validated();
        $customer = $this->run(
            UpdateCustomerJob::class, [
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return response()->json(['data' => $customer])->send();

    }
}
