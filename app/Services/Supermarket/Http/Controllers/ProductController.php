<?php

namespace App\Services\Supermarket\Http\Controllers;

use App\Domains\Product\Features\AddProductFeature;
use App\Domains\Product\Features\DeleteProductFeature;
use App\Domains\Product\Features\GetProductFeature;
use App\Domains\Product\Features\GetProductsFeature;
use App\Domains\Product\Features\UpdateProductFeature;
use Lucid\Units\Controller;

class ProductController extends Controller
{
    public function add()
    {
        return $this->serve(AddProductFeature::class);
    }

    public function get(string $id)
    {
        return $this->serve(GetProductFeature::class,['id' => $id]);
    }

    public function all()
    {
        return $this->serve(GetProductsFeature::class);
    }

    public function update(string $id)
    {
        $this->serve(UpdateProductFeature::class, ['id' => $id]);
    }

    public function delete(string $id)
    {
        $this->serve(DeleteProductFeature::class, ['id' => $id]);
    }
}
