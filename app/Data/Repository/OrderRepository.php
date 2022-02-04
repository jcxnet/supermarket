<?php

declare(strict_types=1);

namespace App\Data\Repository;

use App\Data\Models\Order;
use App\Domains\Order\Exceptions\OrderNotFound;

class OrderRepository implements OrderRepositoryInterface
{

    protected $model;

    /**
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->model = $order;
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
        if (null == $order = $this->model->find($id)) {
            throw new OrderNotFound();
        }

        return $order;
    }
}
