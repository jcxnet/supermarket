<?php

namespace App\Domains\Customer\Features;

use App\Domains\Customer\Jobs\DeleteCustomerJob;
use App\Domains\Customer\Requests\DeleteCustomer;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class DeleteCustomerFeature extends Feature
{
    public function __construct(private string $id, Request $request)
    {
        $request->request->add(['id' => $this->id]);
    }

    public function handle(DeleteCustomer $request)
    {
        $data = $request->validated();

        $deleted = $this->run(
            DeleteCustomerJob::class,[
            'id' => $data['id']
        ]);

        return response()->json(['data' => ['id' => $this->id], 'deleted' => $deleted])->send();
    }
}
