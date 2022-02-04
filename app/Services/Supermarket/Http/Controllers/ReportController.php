<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Domains\Supermarket\Features\GetCompanyProductsFeature;
use App\Domains\Supermarket\Features\GetCustomersBuysFeature;
use App\Domains\Supermarket\Features\GetProductsStoreFeature;
use App\Domains\Supermarket\Features\GetProductsStoresFeature;
use App\Domains\Supermarket\Features\GetStoreOrdersFeature;
use App\Domains\Supermarket\Features\GetStoresOrdersFeature;
use App\Domains\Supermarket\Features\GetStoresSellsFeature;
use Lucid\Units\Controller;

class ReportController extends Controller
{
    public function storeOrders(string $id)
    {
        return $this->serve(GetStoreOrdersFeature::class,['id' => $id]);
    }

    public function storesOrders()
    {
        return $this->serve(GetStoresOrdersFeature::class);
    }

    public function companyProducts(string $id)
    {
        return $this->serve(GetCompanyProductsFeature::class, ['id' => $id]);
    }

    public function productsStore(string $id)
    {
        return $this->serve(GetProductsStoreFeature::class, ['id' => $id]);
    }

    public function productsStores()
    {
        return $this->serve(GetProductsStoresFeature::class);
    }

    public function storesSells()
    {
        return $this->serve(GetStoresSellsFeature::class);
    }

    public function customersBuys()
    {
        return $this->serve(GetCustomersBuysFeature::class);
    }

}
