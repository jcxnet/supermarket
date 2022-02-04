<?php

declare(strict_types=1);

namespace App\Data\Repository;

use App\Data\Models\Product;
use App\Domains\Product\Exceptions\ProductNotFound;

class ProductRepository implements ProductRepositoryInterface
{

    protected $model;

    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        $this->model->fill($data)->save();

        return $this->model;
    }

    public function update(string $id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete(string $id)
    {
        return $this->model->destroy($id);
    }

    public function find(string $id)
    {
        if (null == $product = $this->model->find($id)) {
            throw new ProductNotFound();
        }

        return $product;
    }
}
