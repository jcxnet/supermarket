<?php

declare(strict_types=1);

namespace App\Data\Repository;

use App\Data\Models\Store;
use App\Domains\Store\Exceptions\StoreNotFound;

class StoreRepository implements StoreRepositoryInterface
{

    protected $model;

    /**
     * @param Store $store
     */
    public function __construct(Store $store)
    {
        $this->model = $store;
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
        if (null == $store = $this->model->find($id)) {
            throw new StoreNotFound();
        }

        return $store;
    }
}
