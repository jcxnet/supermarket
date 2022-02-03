<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Domains\Store\Features\AddStoreFeature;
use App\Domains\Store\Features\DeleteStoreFeature;
use App\Domains\Store\Features\GetStoreFeature;
use App\Domains\Store\Features\GetStoresFeature;
use App\Domains\Store\Features\UpdateStoreFeature;
use Lucid\Units\Controller;

class StoreController extends Controller
{
    public function add()
    {
        return $this->serve(AddStoreFeature::class);
    }

    public function get(string $id)
    {
        return $this->serve(GetStoreFeature::class,['id' => $id]);
    }

    public function all()
    {
        return $this->serve(GetStoresFeature::class);
    }

    public function update(string $id)
    {
        $this->serve(UpdateStoreFeature::class, ['id' => $id]);
    }

    public function delete(string $id)
    {
        $this->serve(DeleteStoreFeature::class, ['id' => $id]);
    }
}
