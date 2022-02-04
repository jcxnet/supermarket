<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Domains\Customer\Features\AddCustomerFeature;
use App\Domains\Customer\Features\DeleteCustomerFeature;
use App\Domains\Customer\Features\GetCustomerFeature;
use App\Domains\Customer\Features\GetCustomersFeature;
use App\Domains\Customer\Features\UpdateCustomerFeature;
use Lucid\Units\Controller;

class CustomerController extends Controller
{
    public function add()
    {
        return $this->serve(AddCustomerFeature::class);
    }

    public function get(string $id)
    {
        return $this->serve(GetCustomerFeature::class,['id' => $id]);
    }

    public function all()
    {
        return $this->serve(GetCustomersFeature::class);
    }

    public function update(string $id)
    {
        $this->serve(UpdateCustomerFeature::class, ['id' => $id]);
    }

    public function delete(string $id)
    {
        $this->serve(DeleteCustomerFeature::class, ['id' => $id]);
    }
}
