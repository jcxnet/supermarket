<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Domains\Order\Features\AddOrderFeature;
use App\Domains\Order\Features\DeleteOrderFeature;
use App\Domains\Order\Features\GetOrderFeature;
use App\Domains\Order\Features\GetOrdersFeature;
use App\Domains\Order\Features\UpdateOrderFeature;
use Lucid\Units\Controller;

class OrderController extends Controller
{
    public function add()
    {
        return $this->serve(AddOrderFeature::class);
    }

    public function get(string $id)
    {
        return $this->serve(GetOrderFeature::class,['id' => $id]);
    }

    public function all()
    {
        return $this->serve(GetOrdersFeature::class);
    }

    public function update(string $id)
    {
        $this->serve(UpdateOrderFeature::class, ['id' => $id]);
    }

    public function delete(string $id)
    {
        $this->serve(DeleteOrderFeature::class, ['id' => $id]);
    }
}
